<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_number',
        'payment_date',
        'payed_by',
        'amount_paid',
        'payment_method',
        'description',
        'payment_method',
        // 'invoice_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'payed_by');
    }

    // Define the relationship: A Payment belongs to a PaymentMethod
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function invoices(): BelongsToMany
    {
        return $this->belongsToMany(Invoice::class, 'invoice_payment', 'payment_number', 'invoice_number')
            ->withPivot('amount_paid', 'invoice_balance')
            ->withTimestamps();
    }
}
