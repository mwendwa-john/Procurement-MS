<?php

namespace App\Livewire\Stations\Hotel;

use App\Models\Hotel;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Hotels')]
class ShowHotels extends Component
{
    use WithPagination;

    public function render()
    {
        $hotels = Hotel::paginate(10);

        return view('livewire.stations.hotel.show-hotels', compact('hotels'));
    }
    
    public function bindHotelId($id)
    {
        $this->dispatch('edit-hotel', $id);

        $this->dispatch('delete-hotel', $id);
    }
}
