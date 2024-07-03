<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'street',
        'city',
        'state',
        'postal_code',
    ];

    public function supplier()
    {
        return $this->hasOne(Supplier::class);
    }

    public function hotel()
    {
        return $this->hasOne(Hotel::class);
    }

}
