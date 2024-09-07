<?php

namespace App\Livewire\Stations\Hotel;

use App\Models\Hotel;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Trashed Hotels')]
class TrashedHotels extends Component
{
    public function render()
    {
        $trashedHotels = Hotel::onlyTrashed()->paginate(10);

        return view('livewire.stations.hotel.trashed-hotels', compact('trashedHotels'));
    }
    
}
