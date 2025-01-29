<?php

namespace App\Livewire\Lpos;

use App\Models\Lpo;
use Livewire\Component;

class ViewLpoInvoicesButtons extends Component
{
    public $lpo;
    public $invoiceNumber;

    public function mount($lpoNumber = null, $invoiceNumber = null) // Optional invoiceNumber
    {
        if ($lpoNumber) {
            // Find LPO by lpo_order_number
            $this->lpo = Lpo::where('lpo_order_number', $lpoNumber)->firstOrFail();
        }

        // dd($invoiceNumber);
        // If invoiceNumber is passed, assign it
        if ($invoiceNumber) {
            $this->invoiceNumber = $invoiceNumber;
        }
    }

    public function render()
    {
        return view('livewire.lpos.view-lpo-invoices-buttons');
    }
}
