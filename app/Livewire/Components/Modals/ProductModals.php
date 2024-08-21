<?php

namespace App\Livewire\Components\Modals;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;
use RealRashid\SweetAlert\Facades\Alert;

class ProductModals extends Component
{
    public $productId;

    #[On('pass-product-id')]
    public function bindLpo($id)
    {
        $this->productId = $id;
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

    public function render()
    {
        return view('livewire.components.modals.product-modals');
    }
}
