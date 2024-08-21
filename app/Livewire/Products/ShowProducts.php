<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\GlobalHelpers;

class ShowProducts extends Component
{
    use WithPagination;
    
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $perPage = GlobalHelpers::getPerPage();

        $products = Product::when($this->search, function ($query) {
            $query->where(function ($query) {
                $query->where('item_name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhere('unit_of_measure', 'like', '%' . $this->search . '%')
                    ->orWhere('price', 'like', '%' . $this->search . '%');
            });
        })
            ->latest()
            ->paginate($perPage ?? 15);


        return view('livewire.products.show-products', compact('products'));
    }
}
