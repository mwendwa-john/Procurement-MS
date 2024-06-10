<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    protected static ?string $password;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(RolesPermissionsSeeder::class);
        $this->call(LocationHotelUserSeeder::class);

        // User::create([
        //     'username'          => 'Super-Admin',
        //     'first_name'        => 'Superior',
        //     'middle_name'       => 'Super',
        //     'last_name'         => 'Admin',
        //     'slug'              => 'superior-admin',
        //     'email'             => 'superadmin@superadmin.com',
        //     'email_verified_at' => now(),
        //     'password' => static::$password ??= Hash::make('password'),
        // ]);
    }
}
