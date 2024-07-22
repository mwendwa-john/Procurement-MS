<?php

namespace App\Livewire\Invoices;

use App\Models\Invoice;
use Livewire\Component;

class ShowInvoices extends Component
{
    public function render()
    {
        $invoices = Invoice::all();
        return view('livewire.invoices.show-invoices', compact('invoices'));
    }
}
