<?php

namespace App\Livewire\Payments;

use App\Models\Supplier;
use Livewire\Component;

class ShowSupplierPayments extends Component
{
    public function render()
    {
        $suppliers = Supplier::all();

        return view('livewire.payments.show-supplier-payments', compact('suppliers'));
    }
}
