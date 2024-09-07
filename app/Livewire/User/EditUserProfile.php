<?php

namespace App\Livewire\User;

use Exception;
use App\Models\User;
use App\Models\Person;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use RealRashid\SweetAlert\Facades\Alert;

#[Title('Edit User Profile')]
class EditUserProfile extends Component
{
    use WithFileUploads;

    public $user;
    public $person;

    public $oldProfileImage;

    public $originalUserData;
    public $originalPersonData;


    #[Validate()]
    public $username;

    #[Validate()]
    public $first_name;

    #[Validate()]
    public $middle_name;

    #[Validate()]
    public $last_name;

    #[Validate()]
    public $slug;

    #[Validate()]
    public $email;

    // Person Records
    #[Validate()]
    public $user_id;

    #[Validate()]
    public $edit_profileImage;

    #[Validate()]
    public $user_bio;

    #[Validate()]
    public $phone_no;

    #[Validate()]
    public $gender;

    public function mount($slug)
    {
        $this->user = User::where('slug', $slug)->first();

        $this->person = Person::where('user_id', $this->user->id)->first();

        // Store original user data
        $this->originalUserData = $this->user->only(
            'username',
            'first_name',
            'middle_name',
            'last_name',
            'slug',
            'email',
        );
        // Fill user details fields
        $this->fill($this->originalUserData);


        // Store original person data
        $this->originalPersonData = $this->person->only(
            'user_bio',
            'phone_no',
            'gender',
        );
        // Fill user details fields
        $this->fill($this->originalPersonData);

        $this->oldProfileImage = $this->person->profile_photo_path;
    }

    protected function rules()
    {
        return [
            // User Records
            'username'              => 'required|string|max:255|unique:users,username,' . $this->user->id,
            'first_name'            => 'required|string|max:255',
            'middle_name'           => 'nullable|string|max:255',
            'last_name'             => 'required|string|max:255',
            'slug'                  => 'required|string|max:255|unique:users,slug,' . $this->user->id,
            'email'                 => 'required|string|email|max:255|unique:users,email,' . $this->user->id,
            // 'password'              => 'nullable|string|min:8|same:passwordConfirmation|different:old_password',

            // Person Records
            'edit_profileImage'          => 'nullable|mimes:jpeg,png,gif,jpg',
            'user_bio'              => 'nullable|string',
            'phone_no'              => 'required|string|max:20',
            'gender'                => 'required|in:male,female',
        ];
    }

    public function editUser()
    {
        $validatedData = $this->validate();

        // Start a database transaction
        DB::beginTransaction();

        try {
            $imageUpdated = false;
            // If there is a new image, store it and update the image path
            if ($this->edit_profileImage) {
                $profileImageName = date('Ymd') . '-' . Str::slug($this->last_name) . '-' . $this->first_name . '-' . 'profile-image' . $this->edit_profileImage->getClientOriginalExtension();

                $imagePath = $this->edit_profileImage->storeAs('public/images/profile-images', $profileImageName);

                // Update the Person records
                $this->person->update([
                    'profile_photo_path' => $imagePath,
                ]);
                $imageUpdated = true;
            }

            // Check for changes in User data
            $currentUserData = $this->only(
                'username',
                'first_name',
                'middle_name',
                'last_name',
                'slug',
                'email',
            );

            $userChanges = array_diff_assoc($currentUserData, $this->originalUserData);

            if (!empty($userChanges)) {
                // There are changes, proceed with updating the user
                $this->user->update($validatedData);
                Alert::toast('User updated!', 'success');
            }

            // Check for changes in Person data
            $currentPersonData = $this->only(
                'user_bio',
                'phone_no',
                'gender',
            );

            $personChanges = array_diff_assoc($currentPersonData, $this->originalPersonData);

            if (!empty($personChanges)) {
                // There are changes, proceed with updating the person
                $this->person->update($validatedData);
                Alert::toast('Person updated!', 'success');
            }

            if($imageUpdated) {
                Alert::toast('Profile image updated.', 'success');
            }
            elseif(empty($userChanges) && empty($personChanges)) {
                // No changes were made
                Alert::toast('No changes made!', 'info');
            }

            // Commit the database transaction
            DB::commit();

            return redirect()->route('user.profile', ['slug' => $this->user->slug]);
        } catch (Exception $e) {
            // Rollback the database transaction in case of any error
            DB::rollBack();

            // Log the error using Laravel's logging functionality
            Log::error('Error updating User: ' . $e->getMessage());

            // Show an error message to the user
            Alert::toast('An error occurred while updating the user. Please try again later.', 'error');

            return redirect()->back();
        }
    }


    public function render()
    {
        return view('livewire.user.edit-user-profile');
    }
}
