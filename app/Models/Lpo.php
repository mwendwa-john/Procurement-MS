<?php

namespace App\Models;

use App\Models\Scopes\StoreKeeperScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lpo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'hotel_id',
        'supplier_id',
        'lpo_order_number',
        'tax_date',
        'payment_terms',
        'delivery_date',
        'stage',
        'status',
        'subtotal',
        'include_vat',
        'vat_total',
        'total_amount',
        'created_by',
        'posted_by',
        'added_to_daily_lpos_by',
        'approved_by',
        'invoice_attached_by',
    ];

    public static function boot()
    {
        parent::boot();

        // Delete related LpoItems when an Lpo is deleted
        static::deleting(function ($lpo) {
            $lpo->lpoItems()->delete();
        });

        // Restore related LpoItems when an Lpo is restored
        static::restoring(function ($lpo) {
            $lpo->lpoItems()->withTrashed()->restore();
        });
    }

    // Scope to load specific Hotel LPOs for store keepers
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
    

    public function lpoItems()
    {
        return $this->hasMany(LpoItem::class, 'lpo_order_number', 'lpo_order_number');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'lpo_order_number', 'lpo_order_number');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function postedBy()
    {
        return $this->belongsTo(User::class, 'posted_by');
    }

    public function addedToDailyLposBy()
    {
        return $this->belongsTo(User::class, 'added_to_daily_lpos_by');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }


}
