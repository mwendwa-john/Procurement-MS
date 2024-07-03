<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Address;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create addresses
        $address1 = Address::create([
            'street' => '123 Supplier St',
            'city' => 'Supplier City',
            'state' => 'Supplier State',
            'postal_code' => '12345',
        ]);

        $address2 = Address::create([
            'street' => '456 Supplier Ave',
            'city' => 'Supplier Town',
            'state' => 'Supplier State',
            'postal_code' => '67890',
        ]);

        // Insert suppliers
        $supplier1 = Supplier::create([
            'address_id' => $address1->id,
            'supplier_name' => 'Supplier A',
            'slug' => 'supplier-a',
            'phone_number' => '123-456-7890',
            'email' => fake()->unique()->safeEmail(),
        ]);

        $supplier2 = Supplier::create([
            'address_id' => $address2->id,
            'supplier_name' => 'Supplier B',
            'slug' => 'supplier-b',
            'phone_number' => '123-456-7890',
            'email' => fake()->unique()->safeEmail(),
        ]);


        // Assign hotels to suppliers
        $hotel1 = Hotel::find(1); // Replace with actual hotel ID
        $hotel2 = Hotel::find(2); // Replace with actual hotel ID

        $supplier1->hotels()->attach($hotel1);
        $supplier1->hotels()->attach($hotel2);

        $supplier2->hotels()->attach($hotel2);
    }
}
