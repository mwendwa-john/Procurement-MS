<?php

namespace App\Livewire\Suppliers;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class ShowSuppliers extends Component
{
    use WithPagination;

    public function render()
    {
        $suppliers = Supplier::paginate(15);

        return view('livewire.suppliers.show-suppliers', compact('suppliers'));
    }

}
