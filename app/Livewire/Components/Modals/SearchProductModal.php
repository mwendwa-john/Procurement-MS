<?php

namespace App\Livewire\Components\Modals;

use App\Models\Product;
use Livewire\Component;

class SearchProductModal extends Component
{
    public $search = '';
    public $productSearchResults = [];

    public function updatedSearch()
    {
        $searchTerm = trim($this->search);

        $this->productSearchResults = Product::query()
            ->when($searchTerm, function ($query, $searchTerm) {
                $query->where(function ($query) use ($searchTerm) {
                    $query->where('item_name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('description', 'like', '%' . $searchTerm . '%');
                });
            })
            ->select('id', 'item_name', 'description', 'unit_of_measure', 'price') // Specify only necessary columns
            ->limit(10) // Limit results to 10
            ->get();
    }


    public function render()
    {
        return view('livewire.components.modals.search-product-modal');
    }
}
