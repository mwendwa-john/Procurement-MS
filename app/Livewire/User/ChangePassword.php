<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use RealRashid\SweetAlert\Facades\Alert;

#[Title('Change Password')]
class ChangePassword extends Component
{
    public $user;

    #[Validate()]
    public $currentPassword;

    #[Validate()]
    public $newPassword;

    #[Validate()]
    public $passwordConfirmation;


    public function mount($slug)
    {
        $this->user = User::where('slug', $slug)->first();
    }

    protected $rules = [
        'currentPassword'      => 'required',
        'newPassword'          => 'required|min:8',
        'passwordConfirmation'  => 'required|same:newPassword',
    ];

    public function changePassword()
    {
        $this->validate();

        if (!Hash::check($this->currentPassword, Auth::user()->password)) {
            $this->addError('currentPassword', 'Your current password does not match our records.');
            return;
        }

        $this->user->password = Hash::make($this->newPassword);
        $this->user->save();

        $this->reset('currentPassword', 'newPassword', 'passwordConfirmation');

        Alert::toast('Password successfully updated', 'success');
        Auth::guard('web')->logout();
        return redirect('/');
    }
    
    
    public function render()
    {
        return view('livewire.user.change-password');
    }
}
