<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'lpo_id',
        'invoice_number',
        'description',
        'quantity',
        'unit_of_measure',
        'rate',
        'vat',
        'amount',
        'status',
        'payment_made_by',
        'payment_completed_by',
    ];

    public function lpo()
    {
        return $this->belongsTo(Lpo::class);
    }

    public function paymentMadeBy() {
        return $this->belongsTo(User::class, 'payment_made_by');
    }

    public function paymentCompletedBy() {
        return $this->belongsTo(User::class, 'payment_completed_by');
    }
}
