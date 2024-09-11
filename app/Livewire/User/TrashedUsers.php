<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class TrashedUsers extends Component
{
    public function render()
    {
        $trashedUsers = User::withInactive()->onlyTrashed()->latest()->paginate();

        return view('livewire.user.trashed-users', compact('trashedUsers'));
    }
}
