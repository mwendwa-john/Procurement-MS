<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'address_id',
        'supplier_name',
        'slug',
        'phone_number',
        'email',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'supplier_hotel');
    }

    public function lpos()
    {
        return $this->hasMany(Lpo::class);
    }
}
