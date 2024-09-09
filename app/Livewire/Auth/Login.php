<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

#[Title('Log In')]
class Login extends Component
{
    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    public function authenticate()
    {
        $this->validate();

        // if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
        //     $this->addError('email', trans('auth.failed'));

        //     return;
        // }

        // Check if user email exists (including inactive users)
        if (!User::withInactive()->where('email', $this->email)->exists()) {
            $this->addError('email', trans('email not found'));
            return;
        }

        // Retrieve the user (including inactive users)
        $user = User::withInactive()->where('email', $this->email)->first();

        // Check if the password is correct
        if (!Hash::check($this->password, $user->password)) {
            $this->addError('password', trans('incorrect password'));
            return;
        }

        // If login is successful, ensure the correct user is logged in
        Auth::login($user, $this->remember);


        // Check if the user has verified their email
        if (is_null($user->email_verified_at)) {
            session()->flash('verify-email', 'This user email has not been verified.');
        }

        // check if user is active
        if (!Auth::user()->is_active) {
            session()->flash('info', 'This user account has not been activated. Account will automatically be logged out.');
        }

        // check if user has been assigned to a hotel
        if (!Auth::user()->hotel) {
            session()->flash('hotel', 'This user has not been assigned to a Hotel.');
        }

        $this->reset();

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
