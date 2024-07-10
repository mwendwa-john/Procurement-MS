<?php

namespace App\Livewire\Stations\Hotel;

use App\Models\Hotel;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class HotelProfile extends Component
{

    public $hotel;
    public $hotelId;
    public $unlinkedHotels;

    public function mount($id)
    {
        $this->hotelId = $id;
        // Find the hotel by ID or fail
        $this->hotel = Hotel::findOrFail($id);

        // Get unlinked hotels
        $this->unlinkedHotels = Hotel::where('id', '!=', $id)
            ->where(function ($query) use ($id) {
                $query->where('parent_id', '!=', $id)
                    ->orWhereNull('parent_id');
            })
            ->where(function ($query) {
                $query->whereNull('parent_id');
            })
            ->get();
    }

    public function render()
    {
        $users = User::where('hotel_id', $this->hotelId)->paginate(15);

        $childHotels = $this->hotel->childHotels;

        return view('livewire.stations.hotel.hotel-profile', compact('childHotels', 'users'));
    }

    public function attachChildHotels($parentId, $childId)
    {
        DB::beginTransaction();

        try {
            // Fetch the child hotel and update its parent_id
            $childHotel = Hotel::findOrFail($childId);
            $childHotel->parent_id = $parentId;
            $childHotel->save();

            // Remove the attached hotel from the unlinkedHotels collection
            $this->unlinkedHotels = $this->unlinkedHotels->filter(function ($hotel) use ($childId) {
                return $hotel->id !== $childId;
            });

            DB::commit();

            Alert::toast('child hotel attached','success');
            return redirect()->route('hotel.profile', ['id' => $parentId]);

        } catch (\Exception $e) {
            DB::rollBack();

            // Handle the exception, e.g., log the error or show a user-friendly message
            Alert::toast('Failed to attach the child hotel. Please try again.','error');
            return redirect()->route('hotel.profile', ['id' => $parentId]);
        }

    }

}
