<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'hotel_name',
        'hotel_kra_pin',
        'hotel_image_path',
        'location_id',
    ];

    public function location() {
        return $this->belongsTo(Location::class);
    }

    // relationship with user
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
