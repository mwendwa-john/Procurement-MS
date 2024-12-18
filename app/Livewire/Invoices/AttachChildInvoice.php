<?php

namespace App\Livewire\Invoices;

use App\Models\Invoice;
use App\Models\LpoItem;
use Livewire\Component;
use App\Models\InvoiceItem;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AttachChildInvoice extends Component
{
    public $parentInvoice;
    public $lpo;
    public $lpoItems;

    #[Validate()]
    public $invoice_number;

    #[Validate()]
    public $delivery_date;

    public $includeVat;
    public $vatRate;
    public $vat_total;
    public $subtotal;
    public $total_amount;


    protected $rules = [
        'invoice_number' => 'required|string|unique:invoices,invoice_number',
        'delivery_date'  => 'required|date',
    ];

    public function mount($parentInvoiceNumber)
    {
        // Find the target invoice by invoice_number
        $this->parentInvoice = Invoice::where('invoice_number', $parentInvoiceNumber)->firstOrFail();

        // fetch lpo and lpoItems
        $this->lpo = $this->parentInvoice->lpo;

        $this->lpoItems = $this->lpo->lpoItems->where('is_delivered', false)->toArray();

        $this->includeVat = $this->lpo->include_vat;
    }


    // Calculate the pending_quantity when delivered_quantity is set
    public function updated($field)
    {
        // Extract index and property name from the updated field
        if (preg_match('/lpoItems\.(\d+)\.(new_delivered_quantity|pending_quantity)/', $field, $matches)) {
            $index = $matches[1];

            // Cast new_delivered_quantity and pending_quantity to integers to ensure numeric calculation
            $newDeliveredQty = (int) $this->lpoItems[$index]['new_delivered_quantity'];
            $oldPendingQty = (int) $this->lpoItems[$index]['pending_quantity'];
            $price = (float) $this->lpoItems[$index]['price'];

            // Check if the new_delivered_quantity exceeds the old pending_quantity
            if ($newDeliveredQty > $oldPendingQty) {
                $this->addError("lpoItems.$index.new_delivered_quantity", 'Delivered quantity cannot exceed previous pending quantity.');
                // return; // Stop further execution
            }

            // Recalculate new_pending_quantity as an integer
            $this->lpoItems[$index]['new_pending_quantity'] = $oldPendingQty - $newDeliveredQty;

            // Recalculate amount and format it to two decimal places
            $this->lpoItems[$index]['amount'] = number_format($price * $newDeliveredQty, 2, '.', '');

            // Gate vat rate from the lpo items
            $this->vatRate = $this->lpoItems[$index]['vat'];

            $this->saveItem($index, $this->lpoItems[$index]);
        }

        $this->recalculateTotals();
    }


    public function saveItem($index)
    {
        $oldPendingQty = (int) $this->lpoItems[$index]['pending_quantity'];
        $newDeliveredQty = (int) $this->lpoItems[$index]['new_delivered_quantity'];
        $newPendingQty = (int) $this->lpoItems[$index]['new_pending_quantity'];

        // Ensure delivered quantity does not exceed expected quantity
        if ($newDeliveredQty > $oldPendingQty) {
            // Optionally, you can throw an error or set a message
            // return 'Delivered quantity cannot exceed expected quantity';
            $newDeliveredQty = $oldPendingQty; // Adjust delivered quantity to expected
        }

        // Update delivery and pending stage
        if ($newDeliveredQty === 0) {
            $this->lpoItems[$index]['is_delivered'] = false;
            $this->lpoItems[$index]['is_pending'] = false; // Reset pending stage
        } elseif ($newDeliveredQty < $oldPendingQty) {
            $this->lpoItems[$index]['is_delivered'] = false;
            $this->lpoItems[$index]['is_pending'] = true;
        } elseif ($oldPendingQty === $newPendingQty) {
            $this->lpoItems[$index]['is_delivered'] = false;
        } else {
            $this->lpoItems[$index]['is_delivered'] = true;
            $this->lpoItems[$index]['is_pending'] = false; // Reset pending stage
        }

        // Update delivered quantity in the item after checks
        $this->lpoItems[$index]['new_delivered_quantity'] = $newDeliveredQty;

        // Update pending quantity based on the new delivered quantity
        $this->lpoItems[$index]['new_pending_quantity'] = $oldPendingQty - $newDeliveredQty;
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


    public function attachChildInvoice()
    {
        $validatedData = $this->validate();

        if (!empty($this->lpoItems)) {
            // DB::beginTransaction();

            // try {
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

            // Filter items to save only those marked as "delivered" or "pending"
            $itemsToSave = collect($this->lpoItems)->filter(function ($item) {
                return $item['is_delivered'] || $item['is_pending'];
            });

            $allDelivered = true;
            $someDelivered = false;

            // Loop through and update LPO items
            foreach ($itemsToSave as $item) {
                $lpoItem = LpoItem::where('lpo_item_number', $item['lpo_item_number'])->first();

                if ($lpoItem) {
                    $lpoItem->delivered_quantity = $item['new_delivered_quantity'];
                    $lpoItem->pending_quantity   = $item['new_pending_quantity'];
                    $lpoItem->price              = $item['price'];
                    $lpoItem->vat                = $item['vat'];
                    $lpoItem->is_delivered       = $item['is_delivered'];
                    $lpoItem->is_pending         = $item['is_pending'];
                    $lpoItem->save();

                    // Create a new InvoiceItem
                    InvoiceItem::create([
                        'invoice_number'       => $invoice->invoice_number,
                        'lpo_item_number'      => $lpoItem->lpo_item_number,
                        'quantity_delivered'   => $item['new_delivered_quantity'],
                        'quantity_pending'     => $item['new_pending_quantity'],
                        'invoice_amount'       => $item['amount'],
                    ]);

                    // Determine if all items are fully delivered or partially delivered
                    if ($item['is_pending']) {
                        $someDelivered = true;
                        $allDelivered = false;
                    }

                }
            }

            // Set LPO status based on the items' delivery status
            $status = $allDelivered ? 'delivered' : ($someDelivered ? 'partially_delivered' : 'generated');

            // Update LPO status
            $this->lpo->update([
                'status' => $status,
            ]);

            //     DB::commit();

            Alert::toast('Invoice created and attached', 'success');
            return redirect()->route('invoices.show');
            // } catch (\Exception $e) {
            //     DB::rollBack();
            //     Log::error('Error attaching invoice: ' . $e->getMessage());
            //     Alert::error('An error occurred while attaching the invoice. Please try again later.');
            //     return redirect()->back();
        }
        // } else {
        //     Alert::toast('No pending or undelivered items selected for invoice attachment', 'error');
        //     return redirect()->route('invoice.child.attach', ['parentInvoiceNumber' => $this->parentInvoice->invoice_number]);
        // }
    }



    public function render()
    {
        // Fetch all invoices that belong to the same LPO,
        $relatedInvoices = $this->parentInvoice->lpo->invoices()
            ->get();

        return view('livewire.invoices.attach-child-invoice', compact('relatedInvoices'));
    }
}
