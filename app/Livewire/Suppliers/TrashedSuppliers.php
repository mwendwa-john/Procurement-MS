<?php

namespace App\Livewire\Suppliers;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class TrashedSuppliers extends Component
{
    use WithPagination;
    
    public function render()
    {
        $trashedSuppliers = Supplier::onlyTrashed()->paginate(15);

        return view('livewire.suppliers.trashed-suppliers', compact('trashedSuppliers'));
    }
}
