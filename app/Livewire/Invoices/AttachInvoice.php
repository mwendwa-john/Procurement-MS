<?php

namespace App\Livewire\Invoices;

use App\Models\Lpo;
use App\Models\Invoice;
use App\Models\LpoItem;
use Livewire\Component;
use App\Models\InvoiceItem;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

#[Title('Attach Invoice')]
class AttachInvoice extends Component
{
    public $lpo;
    public $lpoItems;

    #[Validate()]
    public $invoice_number;

    #[Validate()]
    public $delivery_date;

    public $includeVat;
    public $vatRate;
    public $subtotal = 0, $vat_total = 0, $total_amount = 0;


    protected $rules = [
        'invoice_number' => 'required|string|unique:invoices,invoice_number',
        'delivery_date'  => 'required|date',
    ];


    public function mount($lpoOrderNumber)
    {
        // dd($lpoOrderNumber);
        // $this->lpo = Lpo::with(['createdBy', 'postedBy', 'addedToDailyLposBy', 'approvedBy'])->findOrFail($id);

        $this->lpo = Lpo::with(['createdBy', 'postedBy', 'addedToDailyLposBy', 'approvedBy'])
            ->where('lpo_order_number', $lpoOrderNumber)
            ->firstOrFail();

        $this->includeVat = $this->lpo->include_vat;

        // Check if the LPO has any invoices
        $existingInvoice = $this->lpo->invoices()->first();

        if (!$existingInvoice) {
            $this->loadLpoItems();
        } else {
            // Redirect page where the recursive (child) invoice can be added
            return redirect()->route('invoice.child.attach', ['parentInvoiceNumber' => $existingInvoice->invoice_number]);
        }
    }


    public function loadLpoItems()
    {
        if ($this->lpo) {
            $this->lpoItems = $this->lpo->lpoItems->toArray();
        }
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


    public function attachInvoice()
    {
        $validatedData = $this->validate();

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Create the Invoice
            $invoice = Invoice::create([
                'invoice_number'       => $validatedData['invoice_number'],
                'lpo_order_number'     => $this->lpo->lpo_order_number,
                'hotel_id'             => $this->lpo->hotel_id,
                'supplier_id'          => $this->lpo->supplier_id,
                'delivery_date'        => $validatedData['delivery_date'],
                'subtotal'             => $this->subtotal,
                'vat_total'            => $this->vat_total,
                'total_amount'         => $this->total_amount,
                'invoice_attached_by'  => Auth::user()->id,
            ]);

            // Loop through LPO items and update each one
            $allDelivered = true;
            $someDelivered = false;

            foreach ($this->lpoItems as $item) {
                $lpoItem = LpoItem::where('lpo_item_number', $item['lpo_item_number'])->first();

                if ($lpoItem) {
                    // Update LPO item quantities
                    $lpoItem->delivered_quantity = $item['delivered_quantity'] ?? 0;
                    $lpoItem->pending_quantity   = $item['pending_quantity'] ?? 0;
                    $lpoItem->price              = $item['price'];
                    $lpoItem->vat                = $item['vat'];
                    $lpoItem->is_delivered       = $item['is_delivered'];
                    $lpoItem->is_pending         = $item['is_pending'];
                    $lpoItem->save();

                    // Check delivery status for updating LPO status
                    if ($item['is_pending']) {
                        $someDelivered = true;
                        $allDelivered = false;
                    }

                    // Save invoice items for delivered or pending items
                    if ($item['is_delivered'] || $item['is_pending']) {
                        InvoiceItem::create([
                            'invoice_number'       => $invoice->invoice_number,
                            'lpo_item_number'      => $lpoItem->lpo_item_number,
                            'quantity_delivered'   => $item['delivered_quantity'] ?? 0,
                            'quantity_pending'     => $item['pending_quantity'] ?? 0,
                            'invoice_amount'       => $item['amount'],
                        ]);
                    }
                }
            }

            // Determine LPO status
            $status = $allDelivered ? 'delivered' : ($someDelivered ? 'partially_delivered' : 'generated');

            // Update LPO status
            $invoice->lpo->update([
                'status' => $status,
            ]);

            // Commit the transaction
            DB::commit();

            Alert::toast('Invoice created and attached', 'success');
            return redirect()->route('invoices.show');
        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();

            // Log error and show message
            Log::error('Error attaching invoice: ' . $e->getMessage());
            Alert::error('An error occurred while attaching the invoice. Please try again later.');

            return redirect()->back();
        }
    }




    public function render()
    {
        return view('livewire.invoices.attach-invoice');
    }
}
