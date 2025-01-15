<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'parent_id',
        'location_name',
        'location_slug',
    ];

    // relationship with user
    public function users()
    {
        return $this->hasMany(User::class);
    }
    
    public function hotels() {
        return $this->hasMany(Hotel::class);
    }


}
