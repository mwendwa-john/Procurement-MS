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
        'hotel_id',
        'supplier_id',
        'invoice_number',
        'description',
        'quantity',
        'unit_of_measure',
        'rate',
        'vat',
        'amount',
        'status',
        'subtotal',
        'vat_total',
        'total_amount',
        'payment_made_by',
        'payment_completed_by',
    ];

    // Scope to load specific Hotel Invoices for store keepers
    protected static function booted()
    {
        // Get the authenticated user's ID
        $userId = auth()->id();
        $user = auth()->user();

        // Check if the user has any roles assigned
        if ($user && $user->roles->isNotEmpty()) {
            $userRole = $user->roles->first()->name;  // Get the user's single role (assuming the user only has one role)
        } else {
            $userRole = '';
        }

        // Apply the scope conditionally based on the user's role
        static::addGlobalScope(new StoreKeeperScope($userId, $userRole));
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
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
