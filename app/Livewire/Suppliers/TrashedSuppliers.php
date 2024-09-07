<?php

namespace App\Livewire\Suppliers;

use Livewire\Component;
use App\Models\Supplier;
use Livewire\WithPagination;
use App\Helpers\GlobalHelpers;
use Livewire\Attributes\Title;

#[Title('Trashed Suppliers')]
class TrashedSuppliers extends Component
{
    use WithPagination;
    
    public function render()
    {
        $perPage = GlobalHelpers::getPerPage();
        
        $trashedSuppliers = Supplier::onlyTrashed()->paginate($perPage ?? 15);

        return view('livewire.suppliers.trashed-suppliers', compact('trashedSuppliers'));
    }
}
