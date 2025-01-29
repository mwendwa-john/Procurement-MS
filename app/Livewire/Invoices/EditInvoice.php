<?php

namespace App\Livewire\Invoices;

use App\Models\Lpo;
use App\Models\Invoice;
use App\Models\LpoItem;
use Livewire\Component;
use App\Models\InvoiceItem;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Spatie\Valuestore\Valuestore;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class EditInvoice extends Component
{
    public $lpo;
    public $invoice;
    public $lpoItems;
    public $oldInvoiceNumber;

    #[Validate()]
    public $invoice_number;

    #[Validate()]
    public $delivery_date;

    public $includeVat;
    public $vatRate;
    public $subtotal , $vat_total , $total_amount;


    protected function rules()
    {
        return [
            'invoice_number' => [
                'required',
                'string',
                Rule::unique('invoices', 'invoice_number')->ignore($this->invoice->id),
            ],
            'delivery_date' => 'required|date',
        ];
    }


    public function mount($invoiceNumber)
    {
        $this->invoice = Invoice::with(['invoiceAttachedBy', 'invoiceItems.lpoItem'])
            ->where('invoice_number', $invoiceNumber)
            ->firstOrFail();

        $this->lpo = $this->invoice->lpo;

        if ($this->lpo) {
            $this->lpoItems = $this->lpo->lpoItems->toArray();
        }

        $this->fill($this->invoice->only(
            'invoice_number',
            'delivery_date',

            'subtotal',
            'vat_total',
            'total_amount',
        ));

        // $this->includeVat = $this->lpo->include_vat;
        $this->oldInvoiceNumber = $this->invoice->invoice_number;

        // Fetch VAT Rate
        $this->vatRate = Valuestore::make(config_path('system_settings.json'))->get('vat_rate');
    }


    public function updatedIncludeVat($value)
    {
        $this->lpo->include_vat = $value;
        $this->lpo->save(); // Persist the updated value to the database

        $this->recalculateTotals();
    }
    

    // Calculate the pending_quantity when delivered_quantity is set
    public function updated($field)
    {
        // Extract index and property name from the updated field
        if (preg_match('/lpoItems\.(\d+)\.(delivered_quantity|expected_quantity)/', $field, $matches)) {
            $index = $matches[1];

            // Cast delivered_quantity and expected_quantity to integers to ensure numeric calculation
            $deliveredQuantity = (int) $this->lpoItems[$index]['delivered_quantity'];
            $expectedQuantity = (int) $this->lpoItems[$index]['expected_quantity'];
            $price = (float) $this->lpoItems[$index]['price'];

            // Check if delivered_quantity exceeds expected_quantity
            if ($deliveredQuantity > $expectedQuantity) {
                // Set an error message or throw an exception
                $this->addError("lpoItems.$index.delivered_quantity", 'Delivered quantity cannot exceed expected quantity.');
                // return; // Stop further execution
            }

            // Recalculate pending_quantity as an integer
            $this->lpoItems[$index]['pending_quantity'] = $expectedQuantity - $deliveredQuantity;

            // Recalculate amount and format it to two decimal places
            $this->lpoItems[$index]['amount'] = number_format($price * $deliveredQuantity, 2, '.', '');

            // Gate vat rate from the lpo items
            $this->vatRate = $this->lpoItems[$index]['vat'];

            $this->saveItem($index, $this->lpoItems[$index]);
        }

        $this->recalculateTotals();
    }

    public function saveItem($index)
    {
        $expectedQuantity = (int) $this->lpoItems[$index]['expected_quantity'];
        $deliveredQuantity = (int) $this->lpoItems[$index]['delivered_quantity'];
        $pendingQuantity = (int) $this->lpoItems[$index]['pending_quantity'];

        // Ensure delivered quantity does not exceed expected quantity
        if ($deliveredQuantity > $expectedQuantity) {
            // Optionally, you can throw an error or set a message
            // return 'Delivered quantity cannot exceed expected quantity';
            $deliveredQuantity = $expectedQuantity; // Adjust delivered quantity to expected
        }

        // Update delivery and pending stage
        if ($deliveredQuantity === 0) {
            $this->lpoItems[$index]['is_delivered'] = false;
            $this->lpoItems[$index]['is_pending'] = false; // Reset pending stage
        } elseif ($deliveredQuantity < $expectedQuantity) {
            $this->lpoItems[$index]['is_delivered'] = false;
            $this->lpoItems[$index]['is_pending'] = true;
        } elseif ($expectedQuantity === $pendingQuantity) {
            $this->lpoItems[$index]['is_delivered'] = false;
        } else {
            $this->lpoItems[$index]['is_delivered'] = true;
            $this->lpoItems[$index]['is_pending'] = false; // Reset pending stage
        }

        // Update delivered quantity in the item after checks
        $this->lpoItems[$index]['delivered_quantity'] = $deliveredQuantity;

        // Update pending quantity based on the new delivered quantity
        $this->lpoItems[$index]['pending_quantity'] = $expectedQuantity - $deliveredQuantity;
    }


    public function recalculateTotals()
    {
        // Filter and save only the items that have been marked as "delivered" or "pending"
        $itemsToCalculate = collect($this->lpoItems)->filter(function ($item) {
            return $item['is_delivered'] || $item['is_pending'];
        });

        if ($itemsToCalculate->isNotEmpty()) {
            // Calculate the subtotal
            $this->subtotal = $itemsToCalculate->sum('amount');

            // Calculate VAT based on the subtotal and inclusive of VAT
            $vatRate = $this->vatRate / 100;
            $this->vat_total = $this->includeVat ? ($this->subtotal * $vatRate) : 0;

            // Calculate the total amount
            $this->total_amount = $this->subtotal + $this->vat_total;
        }
    }


    public function updateInvoice()
    {
        $validatedData = $this->validate($this->rules());

        // Start a database transaction
        // DB::beginTransaction();

        // try {
        // Find the existing invoice by invoice_number
        $invoice = Invoice::where('invoice_number', $this->oldInvoiceNumber)->first();
        
        if (!$invoice) {
            Alert::toast('Invoice not found.', 'info');
            return redirect()->route('invoices.show');
        }
        // dd($validatedData['invoice_number']);
        // Update Invoice details
        $invoice->update([
            'invoice_number'      => $validatedData['invoice_number'],
            'delivery_date'       => $validatedData['delivery_date'],
            'subtotal'            => $this->subtotal,
            'vat_total'           => $this->vat_total,
            'total_amount'        => $this->total_amount,
        ]);

        // Track delivery status
        $allDelivered = true;
        $someDelivered = false;

        foreach ($this->lpoItems as $item) {
            $lpoItem = LpoItem::where('lpo_item_number', $item['lpo_item_number'])->first();

            if ($lpoItem) {
                // Update LPO item details
                $lpoItem->update([
                    'delivered_quantity' => $item['delivered_quantity'] ?? 0,
                    'pending_quantity'   => $item['pending_quantity'] ?? 0,
                    'price'              => $item['price'],
                    'vat'                => $item['vat'],
                    'is_delivered'       => $item['is_delivered'],
                    'is_pending'         => $item['is_pending'],
                ]);

                // Check delivery status
                if ($item['is_pending']) {
                    $someDelivered = true;
                    $allDelivered = false;
                }

                // Update or create InvoiceItem for delivered/pending items
                InvoiceItem::updateOrCreate(
                    [
                        'invoice_number'  => $invoice->invoice_number,
                        'lpo_item_number' => $lpoItem->lpo_item_number,
                    ],
                    [
                        'quantity_delivered' => $item['delivered_quantity'] ?? 0,
                        'quantity_pending'   => $item['pending_quantity'] ?? 0,
                        'invoice_amount'     => $item['amount'],
                    ]
                );
            }
        }

        // Determine LPO status
        $status = $allDelivered ? 'delivered' : ($someDelivered ? 'partially_delivered' : 'generated');

        // Update LPO status
        $invoice->lpo->update(['status' => $status]);

        // Commit transaction
        // DB::commit();

        Alert::toast('Invoice updated successfully', 'success');
        return redirect()->route('invoices.show');
        // } catch (\Exception $e) {
        //     // Rollback transaction in case of failure
        //     DB::rollBack();

        //     // Log error and show message
        //     Alert::error('An error occurred while updating the invoice. Please try again later.');
        //     return redirect()->route('invoices.show');
        // }
    }



    public function render()
    {
        return view('livewire.invoices.edit-invoice');
    }
}
