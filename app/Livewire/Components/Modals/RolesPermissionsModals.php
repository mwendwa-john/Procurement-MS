<?php

namespace App\Livewire\Components\Modals;

use Illuminate\Http\Request;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use PhpParser\Node\Stmt\Catch_;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class RolesPermissionsModals extends Component
{
    #[Validate()]
    public $name;

    public $deleteId;
    public $restoreId;
    public $permanentDeleteId;

    public function render()
    {
        return view('livewire.components.modals.roles-permissions-modals');
    }

    protected $rules = [
        'name' => 'required|unique:roles,name|min:3',
    ];

    public function createRole()
    {
        $validatedData = $this->validate();

        try {
            // Assuming $validatedData contains the validated data for creating a role
            Role::create($validatedData);
            Alert::toast('Role created successfully', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to create role: ' . $e->getMessage(), 'error');
        }

        return redirect()->route('roles.index');
    }

    #[On('delete-role')]
    public function findRole($id)
    {
        $this->deleteId = $id;
    }

    #[On('restore-role')]
    public function findRoleRestore($id)
    {
        $this->restoreId = $id;
    }

    #[On('permanent-delete-role')]
    public function findRoleDelete($id)
    {
        $this->permanentDeleteId = $id;
    }

    public function deleteRole()
    {
        try {
            // Find the role
            $roleToDelete = Role::findOrFail($this->deleteId);

            // Check if any users are assigned to this role
            if ($roleToDelete->users->isNotEmpty()) {
                Alert::toast('Cannot delete role. Users are assigned to it.', 'error');
                return redirect()->route('roles.index');
            }

            // Delete the role
            $roleToDelete->delete();

            Alert::toast('Role deleted successfully', 'success');
            return redirect()->route('roles.index');
        } catch (\Exception $e) {
            Alert::toast('Failed to delete role: ' . $e->getMessage(), 'error');
            return redirect()->route('roles.index');
        }
    }

    public function restoreRole()
    {
        try {
            // Find the role
            $roleToRestore = Role::onlyTrashed()->findOrFail($this->restoreId);

            // Restore the role
            $roleToRestore->restore();

            Alert::toast('Role restored successfully', 'success');
            return redirect()->route('roles.trashed');
        } catch (\Exception $e) {
            Alert::toast('Failed to restore role: ' . $e->getMessage(), 'error');
            return redirect()->route('roles.trashed');
        }
    }

    public function permanentlyDeleteRole()
    {
        try {
            // Find the role
            $roleToDelete = Role::onlyTrashed()->findOrFail($this->permanentDeleteId);

            // Permanently Delete the role
            $roleToDelete->forceDelete();

            Alert::toast('Role permanently deleted successfully', 'success');
            return redirect()->route('roles.trashed');
        } catch (\Exception $e) {
            Alert::toast('Failed to delete role: ' . $e->getMessage(), 'error');
            return redirect()->route('roles.trashed');
        }
    }
}
