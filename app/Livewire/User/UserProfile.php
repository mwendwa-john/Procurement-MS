<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('User Profile')]
class UserProfile extends Component
{
    public $user;
    public $isOwner;

    public function mount($slug)
    {
        // This will include both active and inactive users
        $this->user = User::withInactive()
            ->where('slug', $slug)
            ->first();

        $this->isOwner = auth()->user()->id === $this->user->id;
    }

    public function render()
    {
        return view('livewire.user.user-profile');
    }
}
