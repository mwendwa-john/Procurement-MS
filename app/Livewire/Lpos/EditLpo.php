<?php

namespace App\Livewire\Lpos;

use App\Models\Lpo;
use App\Models\Hotel;
use App\Models\LpoItem;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Spatie\Valuestore\Valuestore;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

#[Title('Edit Lpo')]
class EditLpo extends Component
{
    public $lpo;
    public $hotels;
    public $suppliers = [];

    // LPO
    #[Validate()]
    public $hotel_name, $selectedSupplier, $lpo_order_number, $tax_date, $payment_terms, $delivery_date;

    // LPO Items
    public $lpoItems = [];
    public $vatRate;
    public $includeVat;
    public $editingIndex = null;
    public $subtotal, $vat_total, $total_amount;

    public function mount($id)
    {
        $this->lpo = Lpo::with(['lpoItems', 'supplier', 'hotel', 'addedToDailyLposBy', 'invoices.invoiceAttachedBy'])->findOrFail($id);

        // Fetch Suppliers
        $hotel = Hotel::findOrFail($this->lpo->hotel_id);

        $this->suppliers = $hotel->suppliers;

        // Fetch VAT Rate
        $this->vatRate = Valuestore::make(config_path('system_settings.json'))->get('vat_rate');

        $this->fill($this->lpo->only(
            'lpo_order_number',
            'tax_date',
            'payment_terms',
            'delivery_date',

            'subtotal',
            'vat_total',
            'total_amount',
        ));

        $this->includeVat        = $this->lpo->include_vat;
        $this->hotel_name        = $hotel->hotel_name;
        $this->selectedSupplier  = $this->lpo->supplier_id;


        $this->lpoItems = $this->lpo->lpoItems->map(function ($item) {
            return [
                'id'                => $item->id,
                'item_name'         => $item->item_name,
                'description'       => $item->description,
                'expected_quantity' => $item->expected_quantity,
                'unit_of_measure'   => $item->unit_of_measure,
                'price'             => $item->price,
                'vat'               => $item->vat,
                'amount'            => $item->amount,
                'is_saved'          => true,
            ];
        })->toArray();
    }

    protected function rules()
    {
        return [
            'selectedSupplier'  => 'required|exists:suppliers,id',
            'lpo_order_number'  => 'required|string|unique:lpos,lpo_order_number,' . ($this->lpo->id ?? 'null'),
            'tax_date'          => 'nullable|date',
            'payment_terms'     => 'nullable|string|max:255',
            'delivery_date'     => 'nullable|date',
        ];
    }


    public function updatedIncludeVat($value)
    {
        $this->lpo->include_vat = $value;
        $this->lpo->save(); // Persist the updated value to the database

        $this->recalculateTotals();
    }


    public function updated($field)
    {
        if (preg_match('/lpoItems\.(\d+)\.(price|expected_quantity)/', $field, $matches)) {
            $index = $matches[1];
            $price = (float) $this->lpoItems[$index]['price'];
            $quantity = (float) $this->lpoItems[$index]['expected_quantity'];
            $this->lpoItems[$index]['amount'] = number_format($price * $quantity, 2, '.', '');
        }

        $this->recalculateTotals();
    }

    public function addItem()
    {
        $this->lpoItems[] = [
            'id' => null,
            'lpo_item_number'       => 'LPO-ITEM-' . Str::uuid(), //Universally Unique Identifier
            'lpo_order_number'      => $this->lpo->lpo_order_number,
            'item_name'             => '',
            'description'           => '',
            'expected_quantity'     => '',
            'unit_of_measure'       => '',
            'price'                 => '',
            'vat'                   => $this->vatRate,
            'amount'                => '0.00',
            'is_saved'              => false
        ];
    }

    #[On('select-product')]
    public function addProduct($id)
    {
        // find Product
        $product = Product::findOrFail($id);

        // add a new item to the list with the product details
        $this->lpoItems[] = [
            'id' => null,
            'lpo_item_number'       => 'LPO-ITEM-' . Str::uuid(), //Universally Unique Identifier
            'lpo_order_number'      => $this->lpo->lpo_order_number,
            'item_name'             => $product->item_name,
            'description'           => $product->description,
            'expected_quantity'     => '',
            'unit_of_measure'       => $product->unit_of_measure,
            'price'                 => $product->price,
            'vat'                   => $this->vatRate,
            'amount'                => '0.00',
            'is_saved'              => false
        ];

        // close modal
        $this->dispatch('close-product-search-modal');
    }


    public function editItem($index)
    {
        $this->editingIndex = $index;
        $this->lpoItems[$index]['is_saved'] = false;
    }


    public function removeItem($index)
    {
        if (isset($this->lpoItems[$index]['id'])) {
            LpoItem::find($this->lpoItems[$index]['id'])->delete();
        }

        unset($this->lpoItems[$index]);
        $this->lpoItems = array_values($this->lpoItems);
        $this->recalculateTotals();
    }

    public function recalculateTotals()
    {
        $this->subtotal = collect($this->lpoItems)->sum('amount');

        $vatRate = $this->vatRate / 100;

        $this->vat_total = $this->includeVat ? ($this->subtotal * $vatRate) : 0;
        $this->total_amount = $this->subtotal + $this->vat_total;
    }


    public function updateLpo()
    {
        $validatedData = $this->validate($this->rules());

        DB::beginTransaction();

        try {
        $this->lpo->update([
            'supplier_id'       => $validatedData['selectedSupplier'],
            'lpo_order_number'  => $validatedData['lpo_order_number'],
            'tax_date'          => $validatedData['tax_date'],
            'payment_terms'     => $validatedData['payment_terms'],
            'delivery_date'     => $validatedData['delivery_date'],
            'subtotal'          => $this->subtotal,
            'include_vat'       => $this->includeVat,
            'vat_total'         => $this->vat_total,
            'total_amount'      => $this->total_amount,
        ]);

        foreach ($this->lpoItems as $item) {
            if (isset($item['id'])) {
                LpoItem::find($item['id'])->update($item);
            } else {
                $this->lpo->lpoItems()->create($item);
            }
        }


        DB::commit();

        Alert::toast('LPO updated successfully!', 'success');
        return redirect()->route('lpos.created');
        } catch (\Exception $e) {
            DB::rollBack();

            Alert::toast('Failed to update LPO!', 'error');
            return redirect()->route('lpos.created');
        }
    }

    public function render()
    {
        return view('livewire.lpos.edit-lpo');
    }
}
