<?php

namespace App\Livewire\Invoices;

use App\Models\Invoice;
use Livewire\Component;

class ViewInvoice extends Component
{
    public $invoice;

    public function mount($invoiceNumber)
    {
        // Fetch invoice data from database
        $this->invoice = Invoice::with(['invoiceAttachedBy', 'invoiceItems.lpoItem'])
            ->where('invoice_number', $invoiceNumber)
            ->firstOrFail();
    }


    public function render()
    {
        return view('livewire.invoices.view-invoice');
    }
}
