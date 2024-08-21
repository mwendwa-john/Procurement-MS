<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\GlobalHelpers;

class ShowUsers extends Component
{
    use WithPagination;

    public function render()
    {
        $perPage = GlobalHelpers::getPerPage();
        
        $users = User::paginate($perPage ?? 15);

        return view('livewire.user.show-users', compact('users'));
    }
}
