<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use RealRashid\SweetAlert\Facades\Alert;

class CreateProduct extends Component
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


    protected $rules = [
        'item_name'         => 'required|string|max:255',
        'product_slug'      => 'required|string|max:255|unique:products,product_slug',
        'description'       => 'nullable|string|max:1000',
        'unit_of_measure'   => 'required|string|max:100',
        'price'             => 'nullable|numeric|min:0|max:9999999999.99',
    ];

    public function updatedItemName()
    {
        $this->product_slug = Str::slug($this->item_name);
    }

    public function createProduct()
    {
        try {
            // Validate input
            $validatedData = $this->validate();

            Product::create($validatedData);

            Alert::toast('Product created', 'success');
            return redirect()->route('products.show');
        } catch (\Exception $e) {
            Alert::toast('Failed to create product: ' . $e->getMessage(), 'error');
            return redirect()->route('products.show');
        }
    }


    public function render()
    {
        return view('livewire.products.create-product');
    }
}
