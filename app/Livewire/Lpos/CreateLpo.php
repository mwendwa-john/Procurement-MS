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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

#[Title('Create Lpo')]
class CreateLpo extends Component
{
    public $hotels;
    public $suppliers;

    // LPO
    #[Validate()]
    public $selectedHotel, $selectedSupplier, $lpo_order_number, $tax_date, $payment_terms, $delivery_date;

    // LPO Items
    public $lpoItems = [];
    public $vatRate;
    public $includeVat = false;
    public $editingIndex = null; // Track the index of the item being edited
    public $subtotal = 0, $vat_total = 0, $total_amount = 0;

    public function mount()
    {
        if (auth()->user()->hasRole('admin')) {
            $this->hotels = Hotel::all();
        } elseif (auth()->user()->hasRole('store-keeper')) {
            $this->hotels = Hotel::where('id', auth()->user()->hotel_id)->get();
        } else {
            abort(403);
        }

        // set vat rate
        $this->vatRate = Valuestore::make(config_path('system_settings.json'))->get('vat_rate');


        // Initialize with one empty item
        $this->lpoItems[] = ['item_name' => '', 'description' => '', 'expected_quantity' => '', 'unit_of_measure' => '', 'price' => '', 'vat' => $this->vatRate, 'amount' => '', 'is_saved' => false];
    }

    protected $rules = [
        // LPO
        'selectedHotel'             => 'required|exists:hotels,id',
        'selectedSupplier'          => 'required|exists:suppliers,id',
        'lpo_order_number'          => 'required|string|unique:lpos,lpo_order_number',
        'tax_date'                  => 'nullable|date',
        'payment_terms'             => 'nullable|string|max:255',
        'delivery_date'             => 'nullable|date',

        // LPO Items
        // 'lpoItems'                  => 'required|array|min:1',
        // 'lpoItems.*.item_name'      => 'required|string',
        // 'lpoItems.*.description'    => 'nullable|string|max:255',
        // 'lpoItems.*.expected_quantity' => 'required|numeric|min:1',
        // 'lpoItems.*.price'          => 'required|numeric|min:0',
        // 'lpoItems.*.amount'         => 'required|numeric|min:0',
    ];

    public function generateLpoOrderNo($hotelId, $hotelAbbr)
    {
        // Find the last LPO for the given hotel
        $lastLpo = Lpo::where('hotel_id', $hotelId)
            ->orderBy('id', 'desc')
            ->first();

        // If no LPOs exist, start from 1
        $orderCount = $lastLpo
            ? (int) substr($lastLpo->lpo_order_number, strrpos($lastLpo->lpo_order_number, '-') + 1) + 1
            : 1;

        // Format with leading zeros if needed (e.g., for a 2-digit format)
        $formattedOrderCount = str_pad($orderCount, 2, '0', STR_PAD_LEFT);

        // Construct the formatted LPO order number
        $formattedString = "{$hotelAbbr}-{$formattedOrderCount}";


        // Generate the lpo_order_number
        $this->lpo_order_number = $formattedString;
    }


    public function updatedSelectedHotel($hotelId)
    {
        $hotel = Hotel::find($hotelId);

        $this->suppliers = $hotel->suppliers;

        // Autogenerate the lpo_order_number
        $this->generateLpoOrderNo($hotelId, $hotel->hotel_abbreviation);
    }

    // Calculate the total amount when price or expected_quantity is set
    public function updated($field)
    {
        // Extract index and property name from the updated field
        if (preg_match('/lpoItems\.(\d+)\.(price|expected_quantity)/', $field, $matches)) {
            $index = $matches[1];

            // Cast price and expected_quantity to float to ensure numeric calculation
            $price = (float) $this->lpoItems[$index]['price'];
            $quantity = (float) $this->lpoItems[$index]['expected_quantity'];

            // Recalculate amount and format it to two decimal places
            $this->lpoItems[$index]['amount'] = number_format($price * $quantity, 2, '.', '');
        }
    }

    public function addItem()
    {
        // add a new item to the list
        $this->lpoItems[] = ['item_name' => '', 'description' => '', 'expected_quantity' => '', 'unit_of_measure' => '', 'price' => '', 'vat' => $this->vatRate, 'amount' => '', 'is_saved' => false];
    }

    #[On('select-product')]
    public function addProduct($id)
    {
        // find Product
        $product = Product::findOrFail($id);

        // add a new item to the list with the product details
        $this->lpoItems[] = [
            'item_name'         => $product->item_name,
            'description'       => $product->description,
            'expected_quantity' => '',
            'unit_of_measure'   => $product->unit_of_measure,
            'price'             => $product->price,
            'vat'               => $this->vatRate,
            'amount'            => '',
            'is_saved'          => false
        ];

        // close modal
        $this->dispatch('close-product-search-modal');
    }

    public function removeItem($index)
    {
        unset($this->lpoItems[$index]);
        $this->lpoItems = array_values($this->lpoItems);

        $this->recalculateTotals();
    }

    public function saveItem($index)
    {
        // Validate the item before marking it as saved
        $validatedItem = $this->validate([
            "lpoItems.$index.item_name"             => 'required|string',
            "lpoItems.$index.description"           => 'nullable|string|max:255',
            "lpoItems.$index.expected_quantity"     => 'required|numeric|min:1',
            "lpoItems.$index.price"                 => 'required|numeric|min:0',
            "lpoItems.$index.amount"                => 'required|numeric|min:0',
        ]);

        // Assign the validated data back to the item
        $this->lpoItems[$index] = array_merge($this->lpoItems[$index], $validatedItem);

        // Mark the item as saved
        $this->lpoItems[$index]['is_saved'] = true;

        // Recalculate totals
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

    public function recalculateTotals()
    {
        $this->subtotal = collect($this->lpoItems)->sum('amount');
        // $this->vat_total = collect($this->lpoItems)->sum('vat');

        // Calculate VAT based on the subtotal
        $vatRate = $this->vatRate / 100;
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

        // Start a database transaction
        DB::beginTransaction();

        try {
            $lpo = Lpo::create([
                'hotel_id'            => $validatedData['selectedHotel'],
                'supplier_id'         => $validatedData['selectedSupplier'],
                'lpo_order_number'    => $validatedData['lpo_order_number'],
                'tax_date'            => $validatedData['tax_date'],
                'payment_terms'       => $validatedData['payment_terms'],
                'delivery_date'       => $validatedData['delivery_date'],
                'status'              => 'generated',
                'subtotal'            => $this->subtotal,
                'include_vat'         => $this->includeVat,
                'vat_total'           => $this->vat_total,
                'total_amount'        => $this->total_amount,
                'created_by'          => Auth::user()->id,
            ]);

            // Filter and save only the items that have been marked as "saved"
            $savedItems = collect($this->lpoItems)->filter(function ($item) {
                return $item['is_saved'];
            });

            LpoItem::insert($savedItems->map(function ($item, $key) use ($lpo, &$lastNumber) {
                return [
                    'lpo_item_number'       => 'LPO-ITEM-' . Str::uuid(), //Universally Unique Identifier
                    'lpo_order_number'      => $lpo->lpo_order_number,
                    'item_name'             => $item['item_name'],
                    'description'           => $item['description'],
                    'expected_quantity'     => $item['expected_quantity'],
                    'pending_quantity'      => $item['expected_quantity'],
                    'unit_of_measure'       => $item['unit_of_measure'],
                    'price'                 => $item['price'],
                    'vat'                   => $item['vat'],
                    'amount'                => $item['amount'],
                ];
            })->toArray());

            // Commit the database transaction
            DB::commit();

            Alert::toast('Local purchase order created', 'success');
            return redirect()->route('lpos.created');
        } catch (\Exception $e) {
            // Rollback the database transaction in case of any error
            DB::rollBack();

            // Handle the exception or log it
            // For example, you can log the error using Laravel's logging functionality
            Log::error('Error creating LPO: ' . $e->getMessage());

            // Show an error message to the user
            Alert::error('An error occurred while creating the LPO. Please try again later.');

            return redirect()->back();
        }
    }

    public function render()
    {
        return view('livewire.lpos.create-lpo');
    }
}
