<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CreateProduct extends Component
{
    #[Validate()]
    public $item_name;

    #[Validate()]
    public $description;

    #[Validate()]
    public $unit_of_measure;

    #[Validate()]
    public $price;


    protected $rules = [
        'item_name'         => 'required|string|max:255',
        'description'       => 'nullable|string|max:1000',
        'unit_of_measure'   => 'required|string|max:100',
        'price'             => 'nullable|numeric|min:0|max:9999999999.99',
    ];

    public function createProduct()
    {
        // Validate input
        $validatedData = $this->validate();

        try {
            // Begin the database transaction
            DB::beginTransaction();

            Product::create($validatedData);

            // Commit the transaction
            DB::commit();

            Alert::toast('Product created', 'success');
            return redirect()->route('products.show');
        } catch (\Exception $e) {
            // Rollback the transaction in case of any error
            DB::rollBack();

            Alert::toast('Failed to create product, try again', 'error');
            return redirect()->route('products.show');
        }
    }


    public function render()
    {
        return view('livewire.products.create-product');
    }
}
