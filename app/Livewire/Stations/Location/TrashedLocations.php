<?php

namespace App\Livewire\Stations\Location;

use App\Models\Location;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Trashed Locations')]
class TrashedLocations extends Component
{

    public function render()
    {
        $trashedLocations = Location::onlyTrashed()->get();

        return view('livewire.stations.location.trashed-locations', compact('trashedLocations'));
    }

}
