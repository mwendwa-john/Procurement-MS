<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'payment_method_name',
    ];

    // Define the relationship: A PaymentMethod can have many payments
    public function payments()
    {
        return $this->hasMany(Payment::class, 'payment_number', 'payment_number');
    }

}
