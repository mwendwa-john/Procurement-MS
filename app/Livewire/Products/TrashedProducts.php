<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use App\Helpers\GlobalHelpers;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Trashed Products')]
class TrashedProducts extends Component
{
    use WithPagination;
    
    public $search = '';

    public function render()
    {
        $perPage = GlobalHelpers::getPerPage();
        
        $trashedProducts = Product::onlyTrashed()->when($this->search, function ($query) {
            $query->where(function ($query) {
                $query->where('item_name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhere('unit_of_measure', 'like', '%' . $this->search . '%')
                    ->orWhere('price', 'like', '%' . $this->search . '%');
            });
        })
            ->latest()
            ->paginate($perPage ?? 15);

        return view('livewire.products.trashed-products', compact('trashedProducts'));
    }
}
