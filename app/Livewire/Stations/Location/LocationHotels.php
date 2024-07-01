<?php

namespace App\Livewire\Stations\Location;

use App\Models\Hotel;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Hotels In Location')]
class LocationHotels extends Component
{
    public $hotels; 

    public function mount($id)
    {
        $this->hotels = Hotel::where('location_id', $id)->get();
    }

    public function render()
    {
        return view('livewire.stations.location.location-hotels');
    }
}
