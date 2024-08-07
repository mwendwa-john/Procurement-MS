<?php

namespace App\Livewire\Lpos;

use App\Models\Lpo;
use App\Models\Hotel;
use App\Models\LpoItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Validate;
use RealRashid\SweetAlert\Facades\Alert;

class CreateLpo extends Component
{
    public $hotels;
    public $suppliers;

    // LPO
    #[Validate()]
    public $selectedHotel, $selectedSupplier, $order_number, $tax_date, $payment_terms, $delivery_date;

    // LPO Items
    public $lpoItems = [];
    public $includeVat = false;
    public $editingIndex = null; // Track the index of the item being edited
    public $subtotal = 0, $vat_total = 0, $total_amount = 0;

    public function mount()
    {
        $this->hotels = Hotel::all();

        // Initialize with one empty item
        $this->lpoItems[] = $this->emptyItem();
    }

    protected $rules = [
        // LPO
        'selectedHotel'             => 'required|exists:hotels,id',
        'selectedSupplier'          => 'required|exists:suppliers,id',
        'order_number'              => 'required|string|unique:lpos,order_number',
        'tax_date'                  => 'nullable|date',
        'payment_terms'             => 'nullable|string|max:255',
        'delivery_date'             => 'nullable|date',

        // LPO Items
        'lpoItems'                  => 'required|array|min:1',
        'lpoItems.*.item_name'      => 'required|string',
        'lpoItems.*.description'    => 'nullable|string|max:255',
        'lpoItems.*.quantity'       => 'required|numeric|min:1',
        'lpoItems.*.price'          => 'required|numeric|min:0',
        'lpoItems.*.amount'         => 'required|numeric|min:0',
    ];

    public function updatedSelectedHotel($hotelId)
    {
        $hotel = Hotel::find($hotelId);

        $this->suppliers = $hotel->suppliers;
    }

    public function emptyItem()
    {
        return [
            'item_name' => '',
            'description' => '',
            'quantity' => 0,
            'unit_of_measure' => '',
            'price' => 0,
            'vat' => 0,
            'amount' => 0,
            'is_saved' => false,
        ];
    }

    public function addItem()
    {
        // Check if the last item is not saved
        if (!$this->lpoItems || end($this->lpoItems)['is_saved'] === false) {
            // Throw validation error
            $this->addError('lpoItems', 'Please save the current item before adding a new one.');
            return;
        }

        // If the last item is saved, add a new item to the list
        $this->lpoItems[] = ['item_name' => '', 'description' => '', 'quantity' => '', 'unit_of_measure' => '', 'price' => '', 'vat' => '', 'amount' => '', 'is_saved' => false];
    }

    public function removeItem($index)
    {
        unset($this->lpoItems[$index]);
        $this->lpoItems = array_values($this->lpoItems);
        $this->recalculateTotals();
    }

    public function saveItem($index)
    {
        $this->lpoItems[$index]['is_saved'] = true;
        $this->recalculateTotals();
    }

    public function editItem($index)
    {
        $this->editingIndex = $index; // Set the index of the item being edited
        $this->lpoItems[$index]['is_saved'] = false;
    }

    public function updateItem($index)
    {
        // Optionally validate the item here

        // Mark the item as saved
        $this->lpoItems[$index]['is_saved'] = true;
        $this->editingIndex = null; // Clear editing state

        // Recalculate totals if necessary
        $this->recalculateTotals();
    }

    public function cancelEdit()
    {
        $this->editingIndex = null; // Clear editing state
    }

    public function recalculateTotals()
    {
        $this->subtotal = collect($this->lpoItems)->sum('amount');
        // $this->vat_total = collect($this->lpoItems)->sum('vat');

        // Calculate VAT based on the subtotal
        $vatRate = 0.16;
        $this->vat_total = $this->includeVat ? ($this->subtotal * $vatRate) : 0;

        // Calculate the total amount
        $this->total_amount = $this->subtotal + $this->vat_total;
    }

    public function updatedIncludeVat()
    {
        $this->recalculateTotals();
    }

    public function createLPO()
    {
        $validatedData = $this->validate();

        $lpo = Lpo::create([
            'hotel_id'        => $validatedData['selectedHotel'],
            'supplier_id'     => $validatedData['selectedSupplier'],
            'order_number'    => $validatedData['order_number'],
            'tax_date'        => $validatedData['tax_date'],
            'payment_terms'   => $validatedData['payment_terms'],
            'delivery_date'   => $validatedData['delivery_date'],
            'subtotal'        => $this->subtotal,
            'vat_total'       => $this->vat_total,
            'total_amount'    => $this->total_amount,
            'generated_by'    => Auth::user()->id,
        ]);

        // Filter and save only the items that have been marked as "saved"
        foreach ($this->lpoItems as $item) {
            if ($item['is_saved']) {
                LpoItem::create([
                    'lpo_id'            => $lpo->id,
                    'item_name'         => $item['item_name'],
                    'description'       => $item['description'],
                    'quantity'          => $item['quantity'],
                    'unit_of_measure'   => $item['unit_of_measure'],
                    'price'             => $item['price'],
                    'vat'               => $item['vat'],
                    'amount'            => $item['amount'],
                ]);
            }
        }

        Alert::toast('Local purchase order created', 'success');
        return redirect()->route('lpos.created');
    }

    public function render()
    {
        return view('livewire.lpos.create-lpo');
    }
}
