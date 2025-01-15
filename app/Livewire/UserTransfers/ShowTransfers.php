<?php

namespace App\Livewire\UserTransfers;

use App\Models\User;
use App\Models\Hotel;
use Livewire\Component;
use App\Models\Location;
use Livewire\WithPagination;
use App\Helpers\GlobalHelpers;

class ShowTransfers extends Component
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

        $users = User::query()
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
            ->paginate($perPage ?? 15);



        $locations = Location::all();
        $hotels = Hotel::all();

        return view('livewire.user-transfers.show-transfers', compact('users', 'hotels', 'locations'));
    }
}
