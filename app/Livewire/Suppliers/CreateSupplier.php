<?php

namespace App\Livewire\Suppliers;

use App\Models\Address;
use App\Models\Hotel;
use Livewire\Component;
use App\Models\Supplier;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use RealRashid\SweetAlert\Facades\Alert;

class CreateSupplier extends Component
{
    public $hotels;
    public $selectedHotels = [];

    // Address
    #[Validate()]
    public $street;

    #[Validate()]
    public $city;

    #[Validate()]
    public $state;

    #[Validate()]
    public $postal_code;

    // Supplier
    #[Validate()]
    public $address_id;

    #[Validate()]
    public $supplier_name;

    #[Validate()]
    public $slug;

    #[Validate()]
    public $phone_number;

    #[Validate()]
    public $email;

    #[Validate()]
    public $category;

    public function mount()
    {
        $this->hotels = Hotel::all();
    }

    public function render()
    {
        return view('livewire.suppliers.create-supplier');
    }

    protected $rules = [
        // Address
        'street'            => 'required|string|max:255',
        'city'              => 'required|string|max:255',
        'state'             => 'required|string|max:255',
        'postal_code'       => 'nullable|string|max:20',
        // Supplier
        'supplier_name'     => 'required|string|max:255|unique:suppliers,supplier_name',
        'slug'              => 'required|string|max:255|unique:suppliers,slug',
        'phone_number'      => 'nullable|string|max:20',
        'email'             => 'required|email|max:255|unique:suppliers,email',
        'category'          => 'required|in:credit,cash,other',
    ];

    public function updatedSupplierName()
    {
        $this->slug = Str::slug($this->supplier_name);
    }

    public function createSupplier()
    {
        // dd($this->selectedHotels);
        try {
            // Validate input
            $validatedData = $this->validate();

            // Create the address
            $address = Address::create($validatedData);

            // Create the Supplier with the address ID
            $supplier = Supplier::create([
                'address_id'        => $address->id,
                'supplier_name'     => $validatedData['supplier_name'],
                'slug'              => $validatedData['slug'],
                'phone_number'      => $validatedData['phone_number'],
                'email'             => $validatedData['email'],
                'category'          => $validatedData['category'],
            ]);

            // Attach hotels if provided
            if ($this->selectedHotels) {
                $supplier->hotels()->attach($this->selectedHotels);
            }

            Alert::toast('Supplier created successfully', 'success');
            return redirect()->route('suppliers.show');
        } catch (\Exception $e) {
            Alert::toast('Failed to create supplier: ' . $e->getMessage(), 'error');
            return redirect()->route('suppliers.show');
        }
    }
}
