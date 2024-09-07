<?php

namespace App\Livewire\RolesPermissions;

use Livewire\Attributes\Title;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

#[Title('Assign Permissions')]
class AssignPermissions extends Component
{
    public $roleName;
    public $role;
    public $permissions;
    public $rolePermissions = [];

    public function mount($roleId)
    {
        $this->role = Role::findOrFail($roleId);
        $this->roleName = $this->role->name;
        $this->permissions = Permission::all();

        $this->rolePermissions = $this->role->permissions->pluck('name')->toArray();
    }

    public function render()
    {
        return view('livewire.roles-permissions.assign-permissions');
    }

    public function updatedRolePermissions($value, $key)
    {
        try {
            $this->role->syncPermissions($this->rolePermissions);
            Alert::toast('Permissions updated successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to update permissions:' . $e->getMessage(), 'error');
        }

        return redirect()->route('permissions.assign', ['roleId' => $this->role]);
    }

}
