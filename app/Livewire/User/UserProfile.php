<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class UserProfile extends Component
{
    public $user;

    public function mount($slug)
    {
        $this->user = User::where('slug', $slug)->first();
    }

    public function render()
    {
        return view('livewire.user.user-profile');
    }
}
