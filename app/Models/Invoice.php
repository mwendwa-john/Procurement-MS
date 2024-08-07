<?php

namespace App\Models;

use App\Models\Scopes\StoreKeeperScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    // Scope to load specific Hotel Invoices for store keepers
    protected static function booted()
    {
        $userId = auth()->id();
        $userRole = auth()->user()->role;

        // Apply the scope conditionally based on the user's role
        static::addGlobalScope(new StoreKeeperScope($userId, $userRole));
    }

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
