<?php

namespace App\Livewire\RolesPermissions;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class UserRoles extends Component
{
    use WithPagination;

    public $roles;
    public $selectedRole = '';

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function render()
    {
        // $queryData = User::all();
        // $users = $queryData->paginate(2);

        $users = User::when($this->selectedRole, function($query) {
            $query->whereHas('roles', function($query) {
                $query->where('name', $this->selectedRole);
            });
        })->with('roles')->paginate(15);

        return view('livewire.roles-permissions.user-roles', compact('users'));
    }

    public function updatedSelectedRole()
    {
        $this->resetPage();
    }

    public function reassignRole($userId, $roleName)
    {
        $user = User::find($userId);

        if ($user) {
            $role = Role::where('name', $roleName)->first();
            if ($role) {
                $user->syncRoles([$roleName]);
                Alert::toast('Role reassigned successfully.', 'success');
            } 
        } else {
            Alert::toast('User not found', 'error');
        }

        return redirect()->route('roles.index');
    }


    public function removeRoles($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->syncRoles([]); // Remove all roles
            Alert::toast('All roles removed successfully.', 'success');
        } else {
            Alert::toast('User not found', 'error');
        }

        return redirect()->route('roles.index');
    }

}
