<?php

namespace App\Livewire\Suppliers;

use App\Models\Hotel;
use Livewire\Component;
use App\Models\Supplier;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class ViewSupplier extends Component
{
    use WithPagination;

    public $supplier;
    public $hotels;

    public function mount($slug)
    {
        $this->supplier = Supplier::with(['hotels', 'address'])->where('slug', $slug)->firstOrFail();

        // Fetch hotels not supplied to by this supplier
        $this->hotels = Hotel::whereDoesntHave('suppliers', function ($query) {
            $query->where('suppliers.id', $this->supplier->id);
        })->get();
        
    }

    public function render()
    {
        $supplierHotels = $this->supplier ? $this->supplier->hotels()->paginate(15) : collect();

        return view('livewire.suppliers.view-supplier', compact('supplierHotels'));
    }

    public function attachHotels($slug, $hotelId)
    {
        // dd('hllo');
        $supplier = Supplier::where('slug', $slug)->firstOrFail();

        $hotel = Hotel::findOrFail($hotelId);

        if ($supplier) {
            $supplier->hotels()->attach($hotelId);

            Alert::toast($hotel->hotel_name . ' attached.', 'success');
        } else {
            Alert::toast('Hotel not attached', 'error');
        }

        return redirect()->route('suppliers.view', ['slug' => $slug]);
    }

}
