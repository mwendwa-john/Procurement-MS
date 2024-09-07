<?php

namespace App\Livewire\User;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Helpers\GlobalHelpers;

class NewUsers extends Component
{
    public function render()
    {
        $perPage = GlobalHelpers::getPerPage();

        // This will include both active and inactive users
        // Get users registered within the last month
        $usersLastMonth = User::withInactive()
            ->where('created_at', '>=', Carbon::now()->subMonth())
            ->paginate($perPage ?? 15);

        return view('livewire.user.new-users', compact('usersLastMonth'));
    }
}
