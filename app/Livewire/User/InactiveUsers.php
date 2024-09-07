<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use App\Helpers\GlobalHelpers;

class InactiveUsers extends Component
{
    public function render()
    {
        $perPage = GlobalHelpers::getPerPage();

        // This will return only inactive users
        $inactiveUsers = User::withInactive()->where('is_active', false)->paginate($perPage ?? 15);

        return view('livewire.user.inactive-users', compact('inactiveUsers'));
    }
}
