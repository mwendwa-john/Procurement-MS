<?php

namespace App\Livewire\UserTransfers;

use App\Models\Hotel;
use Livewire\Component;
use App\Models\Location;
use App\Models\UserTransfer;
use App\Helpers\GlobalHelpers;

class TransferHistory extends Component
{
    public function render()
    {
        $perPage = GlobalHelpers::getPerPage();

        $userTransfers = UserTransfer::with('user')->latest()->paginate($perPage ?? 15);

        $locations = Location::all();
        $hotels = Hotel::all();

        return view('livewire.user-transfers.transfer-history', compact('userTransfers', 'hotels', 'locations'));
    }
}
