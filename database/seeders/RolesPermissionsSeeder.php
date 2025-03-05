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
    public $headquartersRole;
    public $managerRole;
    public $storeKeeperRole;
    public $AssignRolePermission;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->adminRole            = Role::create(['name' => 'admin']);
        $this->directorRole         = Role::create(['name' => 'director']);
        $this->headquartersRole     = Role::create(['name' => 'headquarters']);
        $this->managerRole      = Role::create(['name' => 'manager']);
        $this->storeKeeperRole      = Role::create(['name' => 'store-keeper']);

        $this->createPermissions();
    }

    public function createPermissions()
    {
        $assignRolePermission = Permission::create(['name' => 'assign permissions']);
        $accessAdminDashboard = Permission::create(['name' => 'access admin dashboard']);

        // roles Permissions (Only Admins)
        Permission::create(['name' => 'assign roles']);
        Permission::create(['name' => 'manage roles']);

        // stations Permissions
        $manageLocations    = Permission::create(['name' => 'manage locations']);
        $manageHotels       = Permission::create(['name' => 'manage hotels']);
        $manageSuppliers    = Permission::create(['name' => 'manage suppliers']);

        // User Permissions
        $manageUsers       = Permission::create(['name' => 'manage users']);

        // products Permissions
        $manageProducts       = Permission::create(['name' => 'manage products']);

        // lpo Permissions
        $createLpo       = Permission::create(['name' => 'create lpo']);
        $editLpos        = Permission::create(['name' => 'edit lpos']);
        $deleteLpos      = Permission::create(['name' => 'delete lpos']);
        // lpo stages
        $postLpos         = Permission::create(['name' => 'post lpo']);
        $forwardLpos         = Permission::create(['name' => 'forward lpo']);
        $addToDailyLpos   = Permission::create(['name' => 'add to daily lpo']);
        $approveLpos      = Permission::create(['name' => 'approve lpo']);

        // Invoice Permissions
        $attachInvoice   = Permission::create(['name' => 'attach invoice']);
        $editInvoice   = Permission::create(['name' => 'edit invoices']);
        $deleteInvoice   = Permission::create(['name' => 'delete invoices']);

        // Expenses Permissions
        $acessExpenses   = Permission::create(['name' => 'acess expenses']);
        $manageExpenses   = Permission::create(['name' => 'manage expenses']);

        // payments Permissions
        $accessPayments   = Permission::create(['name' => 'access payments']);
        $makePaymentsOnInvoice   = Permission::create(['name' => 'make payments on invoice']);




        //====================== Assign permissions to roles

        // Admin Role
        $allPermissions = Permission::all();
        $this->adminRole->syncPermissions($allPermissions);  // sync all permission with the admin role

        // End Admin Role


        // Director Role
        $this->directorRole->permissions()->attach([
            $assignRolePermission->id,
            $accessAdminDashboard->id,
            $manageLocations->id,
            $manageHotels->id,
            $manageSuppliers->id,
            $manageUsers->id,
            $manageProducts->id,

            // lpos
            $approveLpos->id,

            // invoices
            $editInvoice->id,
            $deleteInvoice->id,

            // Expensess
            $acessExpenses->id,
            $manageExpenses->id,

            // payments
            $accessPayments->id,
            $makePaymentsOnInvoice->id,
        ]);
        // End Director Role


        // Headquarters Role
        $this->headquartersRole->permissions()->attach([
            $manageProducts->id,
            $addToDailyLpos->id,

            // Expensess
            $acessExpenses->id,
            $manageExpenses->id,
            
            // payments
            $accessPayments->id,

        ]);
        // End Headquarters Role


        // Manager Role
        $this->managerRole->permissions()->attach([
            $manageProducts->id,
            $forwardLpos->id,

            // payments
            $accessPayments->id,

        ]);
        // End Manager Role


        // Store Keeper Role
        $this->storeKeeperRole->permissions()->attach([
            $manageProducts->id,
            // LPOs
            $createLpo->id,
            $editLpos->id,
            $deleteLpos->id,
            $postLpos->id,

            // Invoices
            $attachInvoice->id,

            // payments
            $accessPayments->id,
        ]);
        // End Store Keeper Role



    }
}
