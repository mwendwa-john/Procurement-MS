<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class EditProduct extends Component
{
    #[Validate()]
    public $item_name;

    #[Validate()]
    public $product_slug;

    #[Validate()]
    public $description;

    #[Validate()]
    public $unit_of_measure;

    #[Validate()]
    public $price;

    public $productId;


    protected $rules = [
        'item_name'         => 'required|string|max:255',
        'product_slug'      => 'required|string|max:255|unique:products,product_slug',
        'description'       => 'nullable|string|max:1000',
        'unit_of_measure'   => 'required|string|max:100',
        'price'             => 'nullable|numeric|min:0|max:9999999999.99',
    ];
    

    #[On('pass-product-edit-id')]
    public function bindLpo($id)
    {
        $this->productId = $id;
    }

    public function mount()
    {
        if (!$this->productId) {
            return;
        }
    
        // Find the product
        $product = Product::findOrFail($this->productId);
    
        // Fill the component properties with selected product attributes
        $this->fill($product->only([
            'item_name',
            'product_slug',
            'description',
            'unit_of_measure',
            'price',
        ]));
    }

    public function editProduct()
    {
        dd('hello world');
    }

    public function render()
    {
        return view('livewire.products.edit-product');
    }
}
