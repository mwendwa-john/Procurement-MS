<?php

namespace App\Livewire\Payments;

use App\Models\Invoice;
use Livewire\Component;
use Livewire\Attributes\On;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentsIndex extends Component
{
    public $cartCount;
    public $cartTotal;


    public function mount()
    {
        $this->updateCartDetails();
    }
    
    public function updateCartDetails()
    {
        $this->cartCount = Invoice::where('added_to_cart', true)->count();
        $this->cartTotal = Invoice::where('added_to_cart', true)->sum('total_amount');
    }

    #[On('add-to-cart')]
    public function addToCart($id)
    {
        try {
            $invoice = Invoice::findOrFail($id);

            $invoice->update(['added_to_cart' => true]);

            $this->updateCartDetails();

            // Show success message
            Alert::toast('Invoice added to cart', 'success');
            return redirect()->route('cart');
        } catch (\Exception $e) {
            // Handle exception and show error message
            Alert::toast('Failed to add invoice to cart: ' . $e->getMessage(), 'error');
            return redirect()->route('cart');
        }
    }

    #[On('remove-from-cart')]
    public function removeFromCart($id)
    {
        try {
            $invoice = Invoice::findOrFail($id);

            $invoice->update(['added_to_cart' => false]);

            $this->updateCartDetails();

            // Show success message
            Alert::toast('Invoice removed from cart', 'success');
            return redirect()->route('cart');
        } catch (\Exception $e) {
            // Handle exception and show error message
            Alert::toast('Failed to remove invoice from cart: ' . $e->getMessage(), 'error');
            return redirect()->route('cart');
        }
    }

    

    public function render()
    {
        return view('livewire.payments.payments-index');
    }
}
