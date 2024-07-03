<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Person;
use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocationHotelUserSeeder extends Seeder
{
    protected static ?string $password;

    // locations
    public $superior;
    public $nairobi;
    public $naivasha;
    public $limuru;

    public $addressId;
    // Hotels
    public $SuperiorHotel;
    public $ridgeCabinHotel;
    public $westwoodHotel;
    public $hadassahHotel;
    public $sweetLakeHotel;
    public $lnrHotel;

    public $userId;


    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $this->createLocations();

        $this->createHotels();

        $this->createUsers();
    }

    public function createLocations()
    {
        // create location
        $this->superior = Location::create([
            'location_name'  => 'Superior Hotels'
        ]);

        $this->nairobi = Location::create([
            'parent_id'      => $this->superior->id,
            'location_name'  => 'Nairobi'
        ]);

        $this->naivasha = Location::create([
            'parent_id'      => $this->superior->id,
            'location_name'  => 'Naivasha'
        ]);

        $this->limuru = Location::create([
            'parent_id'      => $this->superior->id,
            'location_name'  => 'Limuru'
        ]);
        // End Location
    }
    public function createAddresses()
    {
        // You can call this method within the createHotels method
        // to create an address for each hotel and get its ID
    }
    
    public function createHotels()
    {
        // Create address for Superior Hotel and assign address_id
        $superiorAddress = Address::create([
            'street' => fake()->streetAddress,
            'city' => fake()->city,
            'state' => fake()->state,
            'postal_code' => fake()->postcode,
        ]);
        
        $this->SuperiorHotel = Hotel::create([
            'address_id'    => $superiorAddress->id,
            'hotel_name'    => 'Superior Hotels',
            'hotel_kra_pin' => 123456789,
            'location_id'   => $this->superior->id,
        ]);
    
        // Create address for Ridge Cabin Hotel and assign address_id
        $ridgeCabinAddress = Address::create([
            'street' => fake()->streetAddress,
            'city' => fake()->city,
            'state' => fake()->state,
            'postal_code' => fake()->postcode,
        ]);
        
        $this->ridgeCabinHotel = Hotel::create([
            'address_id'    => $ridgeCabinAddress->id,
            'hotel_name'    => 'Ridge Cabin',
            'hotel_kra_pin' => 123456789,
            'location_id'   => $this->limuru->id,
        ]);
    
        // Create address for West Wood Hotel and assign address_id
        $westwoodAddress = Address::create([
            'street' => fake()->streetAddress,
            'city' => fake()->city,
            'state' => fake()->state,
            'postal_code' => fake()->postcode,
        ]);
        
        $this->westwoodHotel = Hotel::create([
            'address_id'    => $westwoodAddress->id,
            'hotel_name'    => 'West Wood Hotel',
            'hotel_kra_pin' => 123456789,
            'location_id'   => $this->nairobi->id,
        ]);
    
        // Create address for Hadassah Hotel and assign address_id
        $hadassahAddress = Address::create([
            'street' => fake()->streetAddress,
            'city' => fake()->city,
            'state' => fake()->state,
            'postal_code' => fake()->postcode,
        ]);
        
        $this->hadassahHotel = Hotel::create([
            'address_id'    => $hadassahAddress->id,
            'hotel_name'    => 'Hadassah Hotel',
            'hotel_kra_pin' => 123456789,
            'location_id'   => $this->nairobi->id,
        ]);
    
        // Create address for Sweet Lake Resort and assign address_id
        $sweetLakeAddress = Address::create([
            'street' => fake()->streetAddress,
            'city' => fake()->city,
            'state' => fake()->state,
            'postal_code' => fake()->postcode,
        ]);
        
        $this->sweetLakeHotel = Hotel::create([
            'address_id'    => $sweetLakeAddress->id,
            'hotel_name'    => 'Sweet Lake Resort',
            'hotel_kra_pin' => 123456789,
            'location_id'   => $this->naivasha->id,
        ]);
    
        // Create address for Lake Naivasha Resort and assign address_id
        $lnrAddress = Address::create([
            'street' => fake()->streetAddress,
            'city' => fake()->city,
            'state' => fake()->state,
            'postal_code' => fake()->postcode,
        ]);
        
        $this->lnrHotel = Hotel::create([
            'address_id'    => $lnrAddress->id,
            'hotel_name'    => 'Lake Naivasha Resort',
            'hotel_kra_pin' => 123456789,
            'location_id'   => $this->naivasha->id,
        ]);
    }
    

    public function createUsers()
    {
        // ========================     Users   ===================================
        $this->userId = User::create([
            'username'          => 'Super-Admin',
            'first_name'        => 'Superior',
            'middle_name'       => 'Super',
            'last_name'         => 'Admin',
            'slug'              => 'superior-admin',
            'location_id'       => $this->superior->id,
            'hotel_id'          => $this->SuperiorHotel->id,
            'email'             => 'superadmin@superadmin.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
        ])->assignRole('admin');

        $this->personTable();

        $this->userId = User::create([
            'username'          => 'Director',
            'first_name'        => 'Superior',
            'middle_name'       => 'System',
            'last_name'         => 'Director',
            'slug'              => 'superior-director',
            'location_id'       => $this->superior->id,
            'hotel_id'          => $this->SuperiorHotel->id,
            'email'             => 'director@director.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
        ])->assignRole('director');

        $this->personTable();

        $this->userId = User::create([
            'username'          => 'Headquarters',
            'first_name'        => 'Superior',
            'middle_name'       => 'System',
            'last_name'         => 'headquarters',
            'slug'              => 'superior-headquarters',
            'location_id'       => $this->superior->id,
            'hotel_id'          => $this->SuperiorHotel->id,
            'email'             => 'headquarters@headquarters.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
        ])->assignRole('headquarters');

        $this->personTable();
    }

    public function personTable()
    {
        Person::create([
            'user_id'           => $this->userId->id,
            'profile_photo_path' => fake()->unique()->uuid . '.jpg',
            'user_bio'          => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, eligendi dolorum sequi illum qui unde aspernatur non deserunt',
            'phone_no'          => fake()->phoneNumber,
            'gender'            => fake()->randomElement(['Male', 'Female']),
        ]);
    }
}
