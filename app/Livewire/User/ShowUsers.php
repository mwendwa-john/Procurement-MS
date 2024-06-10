<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUsers extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::paginate(15);

        return view('livewire.user.show-users', compact('users'));
    }
}
