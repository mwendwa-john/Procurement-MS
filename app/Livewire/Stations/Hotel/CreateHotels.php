<?php

namespace App\Livewire\Stations\Hotel;

use App\Models\Hotel;
use App\Models\Address;
use Livewire\Component;
use App\Models\Location;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use RealRashid\SweetAlert\Facades\Alert;

class CreateHotels extends Component
{
    use WithFileUploads;

    public $locations;
    public $belongsToHotels;

    // Address
    #[Validate()]
    public $street;

    #[Validate()]
    public $city;

    #[Validate()]
    public $state;

    #[Validate()]
    public $postal_code;

    // Hotel
    #[Validate()]
    public $parent_id;

    #[Validate()]
    public $hotel_image_path;

    #[Validate()]
    public $hotel_name;

    #[Validate()]
    public $hotel_abbreviation;

    #[Validate()]
    public $hotel_kra_pin;

    #[Validate()]
    public $location_id;

    public function mount()
    {
        $this->locations = Location::all();
        $this->belongsToHotels = Hotel::all();
    }

    public function render()
    {
        return view('livewire.stations.hotel.create-hotels');
    }

    protected $rules = [
        // Address
        'street'            => 'required|string|max:255',
        'city'              => 'required|string|max:255',
        'state'             => 'required|string|max:255',
        'postal_code'       => 'nullable|string|max:20',
        // Hotels
        'parent_id'         => 'nullable|integer',
        'hotel_image_path'  => 'nullable|image|max:4096',
        'hotel_name'        => 'required|unique:hotels,hotel_name|min:3',
        'hotel_abbreviation'=> 'required|unique:hotels,hotel_abbreviation',
        'hotel_kra_pin'     => 'required|string|unique:hotels,hotel_kra_pin',
        'location_id'       => 'required|exists:locations,id',
    ];

    public function createHotel()
    {
        // Validate input
        $validatedData = $this->validate();

        try {
            // Handle hotel image upload
            $hotelImagePath = null;

            if ($this->hotel_image_path) {
                // Generate a safe filename for the hotel image
                $hotelImageName = uniqid() . '-' . date('Y-m-d') . '-' . auth()->user()->first_name . '-' . auth()->user()->last_name . '.' . $this->hotel_image_path->getClientOriginalExtension();

                // Store the image
                $hotelImagePath = $this->hotel_image_path->storeAs('public/images/hotel-images', $hotelImageName);
            }

            // Create the address
            $address = Address::create([
                'street'        => $validatedData['street'],
                'city'          => $validatedData['city'],
                'state'         => $validatedData['state'],
                'postal_code'   => $validatedData['postal_code'],
            ]);

            // Create the hotel with the address ID
            Hotel::create([
                'address_id'        => $address->id,
                'parent_id'         => $validatedData['parent_id'],
                'hotel_image_path'  => $hotelImagePath,
                'hotel_name'        => $validatedData['hotel_name'],
                'hotel_abbreviation'=> $validatedData['hotel_abbreviation'],
                'hotel_kra_pin'     => $validatedData['hotel_kra_pin'],
                'location_id'       => $validatedData['location_id'],
            ]);

            Alert::toast('Hotel created successfully', 'success');
            return redirect()->route('hotels.show');
        } catch (\Exception $e) {
            Alert::toast('Failed to create hotel: ' . $e->getMessage(), 'error');
            return redirect()->route('hotels.show');
        }
    }
}
