<?php

namespace App\Livewire\User;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Helpers\GlobalHelpers;
use App\Models\Hotel;
use App\Models\Location;
use Livewire\WithPagination;

class NewUsers extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedLocation = null;
    public $selectedHotel = null;

    protected $queryString = ['search', 'selectedLocation', 'selectedHotel'];

    public function updating($field)
    {
        // Reset pagination when filters are updated
        $this->resetPage();
    }

    public function render()
    {
        $perPage = GlobalHelpers::getPerPage();

        // Get users registered within the last month. This will include both active and inactive users
        $usersLastMonth = User::query()
            ->withInactive()
            ->when($this->search, function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('username', 'like', "%{$this->search}%")
                        ->orWhere('first_name', 'like', "%{$this->search}%")
                        ->orWhere('last_name', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%");
                });
            })
            ->when($this->selectedLocation, fn($query) => $query->where('location_id', $this->selectedLocation))
            ->when($this->selectedHotel, fn($query) => $query->where('hotel_id', $this->selectedHotel))
            ->where('created_at', '>=', Carbon::now()->subMonth())
            ->paginate($perPage ?? 15);


        $locations = Location::all();
        $hotels = Hotel::all();

        return view('livewire.user.new-users', compact('usersLastMonth', 'locations', 'hotels'));
    }
}
