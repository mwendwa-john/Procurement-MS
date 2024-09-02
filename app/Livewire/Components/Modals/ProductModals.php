<?php

namespace App\Livewire\Components\Modals;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use RealRashid\SweetAlert\Facades\Alert;

class ProductModals extends Component
{
    #[Validate()]
    public $item_name;

    #[Validate()]
    public $description;

    #[Validate()]
    public $unit_of_measure;

    #[Validate()]
    public $price;

    public $viewProduct;
    public $originalProductData;
    public $productToEdit;
    public $productId;


    protected $rules = [
        'item_name'         => 'required|string|max:255',
        'description'       => 'nullable|string|max:1000',
        'unit_of_measure'   => 'required|string|max:100',
        'price'             => 'nullable|numeric|min:0|max:9999999999.99',
    ];

    #[On('pass-product-id')]
    public function bindLpo($id)
    {
        $this->productId = $id;
    }

    #[On('view-product')]
    public function viewProduct($id)
    {
        $this->productId = $id;

        $this->viewProduct = Product::findOrFail($this->productId);

        $this->fill($this->viewProduct->only(
            'item_name',
            'description',
            'unit_of_measure',
            'price',
        ));
    }

    #[On('pass-product-edit-id')]
    public function findEditProduct($id)
    {
        $this->productId = $id;
        $this->productToEdit = Product::findOrFail($this->productId);

        // Store original product data
        $this->originalProductData = $this->productToEdit->only(
            'item_name',
            'description',
            'unit_of_measure',
            'price',
        );

        // Fill product details fields
        $this->fill($this->originalProductData);
    }

    public function editProduct()
    {
        // Validate the data before updating
        $validatedData = $this->validate();

        $currentData = $this->only(
            'item_name',
            'description',
            'unit_of_measure',
            'price',
        );

        // Check for changes
        $changes = array_diff_assoc($currentData, $this->originalProductData);

        if (!empty($changes)) {
            // There are changes, proceed with updating the product
            $this->productToEdit->update($validatedData);
            Alert::toast('Product updated!', 'success');
        } else {
            // No changes were made
            Alert::toast('No changes made!', 'info');
        }

        return redirect()->route('products.show');
    }


    public function deleteProduct()
    {
        try {
            // Find the product
            $productToDelete = Product::findOrFail($this->productId);

            // Delete the product
            $productToDelete->delete();

            Alert::toast($productToDelete->item_name . ' deleted', 'success');
            return redirect()->route('products.show');
        } catch (\Exception $e) {
            Alert::toast('Failed to delete product: ' . $e->getMessage(), 'error');
            return redirect()->route('products.show');
        }
    }

    public function restoreProduct()
    {
        try {
            // Find the Product
            $productToRestore = Product::onlyTrashed()->findOrFail($this->productId);

            // Restore the supplier
            $productToRestore->restore();

            Alert::toast($productToRestore->item_name . ' ' . 'restored successfully', 'success');
            return redirect()->route('products.trashed');
        } catch (\Exception $e) {
            Alert::toast('Failed to restore product: ' . $e->getMessage(), 'error');
            return redirect()->route('products.trashed');
        }
    }

    public function render()
    {
        return view('livewire.components.modals.product-modals');
    }
}
