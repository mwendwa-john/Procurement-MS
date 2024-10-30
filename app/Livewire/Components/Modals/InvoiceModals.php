<?php

namespace App\Livewire\Components\Modals;

use App\Models\Invoice;
use Livewire\Component;
use Livewire\Attributes\On;
use RealRashid\SweetAlert\Facades\Alert;

class InvoiceModals extends Component
{
    public $invoiceId;

    #[On('pass-invoice-id')]
    public function bindInvoice($id)
    {
        $this->invoiceId = $id;
    }

    public function deleteInvoice()
    {
        try {
            // Find the invoice
            $invoiceToDelete = Invoice::findOrFail($this->invoiceId);

            // Check if any invoices are assigned to this invoice
            // if ($invoiceToDelete->payments()->exists()) {
            //     Alert::toast('Cannot delete invoice. A payment is linked to it.', 'error');
            //     return redirect()->route('invoices.show');
            // }

            // Delete the invoice
            $invoiceToDelete->delete();

            Alert::toast('Invoice deleted successfully', 'success');
            return redirect()->route('invoices.show');
        } catch (\Exception $e) {
            Alert::toast('Failed to delete invoice: ' . $e->getMessage(), 'error');
            return redirect()->route('invoices.show');
        }
    }

    public function render()
    {
        return view('livewire.components.modals.invoice-modals');
    }
}
