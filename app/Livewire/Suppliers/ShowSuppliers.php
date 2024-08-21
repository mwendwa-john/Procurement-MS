<?php

namespace App\Livewire\Suppliers;

use Livewire\Component;
use App\Models\Supplier;
use Livewire\WithPagination;
use App\Helpers\GlobalHelpers;

class ShowSuppliers extends Component
{
    use WithPagination;

    public function render()
    {
        $perPage = GlobalHelpers::getPerPage();
        
        $suppliers = Supplier::paginate($perPage ?? 15);

        return view('livewire.suppliers.show-suppliers', compact('suppliers'));
    }

}
