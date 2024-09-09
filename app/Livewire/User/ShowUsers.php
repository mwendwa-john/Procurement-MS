<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\GlobalHelpers;
use Livewire\Attributes\Title;

#[Title('Users')]
class ShowUsers extends Component
{
    use WithPagination;
    public function render()
    {
        $perPage = GlobalHelpers::getPerPage();

        $users = User::latest()->paginate($perPage ?? 15);

        // $users = User::with(['location', 'hotel'])
        //     ->when($this->search, function ($query) {
        //         $query->where(function ($query) {
        //             $query->where('username', 'like', '%' . $this->search . '%')
        //                 ->orWhere('first_name', 'like', '%' . $this->search . '%')
        //                 ->orWhere('middle_name', 'like', '%' . $this->search . '%')
        //                 ->orWhere('last_name', 'like', '%' . $this->search . '%');
        //         });
        //     })
        //     ->when($this->location_id, function ($query) {
        //         $query->where('location_id', $this->location_id);
        //     })
        //     ->when($this->hotel_id, function ($query) {
        //         $query->where('hotel_id', $this->hotel_id);
        //     })
        //     ->latest()
        //     ->paginate($perPage ?? 15);

        // $locations = Location::all();
        // $hotels = Hotel::all();
        // $roles = Role::all();


        return view('livewire.user.show-users', compact('users'));
    }
}
