<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LpoItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'lpo_id', 
        'item', 
        'description', 
        'quantity', 
        'unit_of_measure', 
        'price', 
        'vat', 
        'amount',
    ];

    public function lpo()
    {
        return $this->belongsTo(Lpo::class);
    }
}
