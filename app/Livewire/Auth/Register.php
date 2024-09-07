<?php

namespace App\Livewire\Auth;

use Exception;
use App\Models\User;
use App\Models\Person;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

#[Title('Register')]
class Register extends Component
{
    use WithFileUploads;

    #[Validate()]
    public $username;

    #[Validate()]
    public $first_name;

    #[Validate()]
    public $middle_name;

    #[Validate()]
    public $last_name;

    #[Validate()]
    public $email;

    #[Validate()]
    public $slug;

    #[Validate()]
    public $password;

    #[Validate()]
    public $passwordConfirmation = '';

    // Person Records
    #[Validate()]
    public $user_id;

    #[Validate()]
    public $profileImage;

    #[Validate()]
    public $user_bio;

    #[Validate()]
    public $phone_no;

    #[Validate()]
    public $gender;



    protected $rules = [
        'username'              => 'required|string|max:255|unique:users,username',
        'first_name'            => 'required|string|max:255',
        'middle_name'           => 'nullable|string|max:255',
        'last_name'             => 'required|string|max:255',
        'slug'                  => 'required|string|max:255|unique:users,slug',
        'email'                 => 'required|string|email|max:255|unique:users,email',
        'password'              => 'required|min:8',
        'passwordConfirmation'  => 'required|min:8|same:password',

        // Person Records
        'profileImage'          => 'required|mimes:jpeg,png,gif,jpg',
        'user_bio'              => 'nullable|string',
        'phone_no'              => 'required|string|max:20',
        'gender'                => 'required|in:male,female,other',
    ];


    // This method updates the slug whenever any of the relevant properties change
    public function updated($propertyName)
    {
        if (in_array($propertyName, ['first_name', 'middle_name', 'last_name'])) {
            $this->slug = Str::slug($this->last_name . ' ' . $this->first_name . ' ' . $this->middle_name);
        }
    }

    public function registerUser()
    {
        $validatedData = $this->validate();

        // Start a database transaction
        DB::beginTransaction();

        try {
            $user = User::create([
                'username'      => $validatedData['username'],
                'first_name'    => $validatedData['first_name'],
                'middle_name'   => $validatedData['middle_name'],
                'last_name'     => $validatedData['last_name'],
                'slug'          => $this->slug,
                'email'         => $validatedData['email'],
                'password'      => Hash::make($validatedData['password']),
            ]);

            $profileImagePath = $this->uploadProfileImage($validatedData['profileImage']);

            Person::create([
                'user_id'               => $user->id,
                'profile_photo_path'    => $profileImagePath,
                'user_bio'              => $validatedData['user_bio'],
                'phone_no'              => $validatedData['phone_no'],
                'gender'                => $validatedData['gender'],
            ]);

            event(new Registered($user));

            // Commit the database transaction
            DB::commit();

            // check if user is active
            if (!$user->is_active) {
                session()->flash('info', 'This user account has not been activated.');
            }

            // check if user has been assigned to a hotel
            if (!$user->hotel) {
                session()->flash('hotel', 'This user has not been assigned to a Hotel.');
            }

            Alert::toast('User registered', 'success');
            Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']], true);

            return redirect()->intended(route('home'));
        } catch (Exception $e) {
            // Rollback the database transaction in case of any error
            DB::rollBack();

            // Log the error using Laravel's logging functionality
            Log::error('Error registering User: ' . $e->getMessage());

            // Show an error message to the user
            Alert::toast('An error occurred while registering the user. Please try again later.', 'error');

            return redirect()->back();
        }
    }

    private function uploadProfileImage($image)
    {
        $profileImageName = date('Ymd') . '-' . Str::slug($this->last_name) . '-' . $this->first_name . '-' . 'profile-image' . $image->getClientOriginalExtension();

        $imagePath = $image->storeAs('public/images/profile-images', $profileImageName);

        return $imagePath;
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.app');
    }
}
