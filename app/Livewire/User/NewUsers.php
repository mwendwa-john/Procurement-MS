<?php

namespace App\Livewire\User;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Helpers\GlobalHelpers;
use App\Models\Location;
use Livewire\WithPagination;

class NewUsers extends Component
{
    use WithPagination;

    public $location_id = null;


    
    public function updatingLocationId()
    {
        dd('updated Location');
        $this->resetPage();
    }

    public function render()
    {
        $perPage = GlobalHelpers::getPerPage();

        // This will include both active and inactive users
        // Get users registered within the last month
        $usersLastMonth = User::withInactive()
            ->where('created_at', '>=', Carbon::now()->subMonth())
            ->paginate($perPage ?? 15);


            $locations = Location::all();

        return view('livewire.user.new-users', compact('usersLastMonth', 'locations'));
    }
}
