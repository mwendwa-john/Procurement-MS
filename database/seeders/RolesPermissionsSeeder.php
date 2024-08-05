<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesPermissionsSeeder extends Seeder
{
    public $adminRole;
    public $directorRole;
    public $AssignRolePermission;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->adminRole = Role::create(['name' => 'admin']);
        Role::create(['name' => 'director']);
        Role::create(['name' => 'headquarters']);
        Role::create(['name' => 'store-keeper']);

        $this->createPermissions();


        $directorRole = Role::findByName('director');
        $directorRole->givePermissionTo($this->AssignRolePermission);

        // sync all permission with the admin role
        $adminRole = Role::findByName('admin');
        $allPermissions = Permission::all();
        $adminRole->syncPermissions($allPermissions);
    }

    public function createPermissions()
    {
        $this->AssignRolePermission = Permission::create(['name' => 'assign permissions']);
        Permission::create(['name' => 'access admin dashboard']);
        
        // roles Permissions
        Permission::create(['name' => 'assign roles']);
        Permission::create(['name' => 'manage roles']);

        // stations Permissions
        Permission::create(['name' => 'manage locations']);
        Permission::create(['name' => 'manage hotels']);
        Permission::create(['name' => 'manage suppliers']);
        
        // User Permissions
        Permission::create(['name' => 'manage users']);
        
        // lpo Permissions
        Permission::create(['name' => 'create lpo']);
        Permission::create(['name' => 'manage lpos']);
    }
}
