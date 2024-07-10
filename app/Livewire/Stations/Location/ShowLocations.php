<?php

namespace App\Livewire\Stations\Location;

use App\Models\Location;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Locations')]
class ShowLocations extends Component
{
    public function render()
    {
        $locations = Location::all();

        return view('livewire.stations.location.show-locations', compact('locations'));
    }
    
}
