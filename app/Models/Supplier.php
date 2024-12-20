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
        'supplier_number',
        'slug',
        'phone_number',
        'email',
        'category',
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

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class, 'supplier_number', 'supplier_number');
    }
}
