<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'address_id',
        'parent_id',
        'hotel_image_path',
        'hotel_name',
        'hotel_kra_pin',
        'location_id',
    ];

    public function parentHotel()
    {
        return $this->belongsTo(Hotel::class, 'parent_id');
    }

    public function childHotels()
    {
        return $this->hasMany(Hotel::class, 'parent_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    // relationship with user
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'supplier_hotel');
    }
}
