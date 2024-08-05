<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lpo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'hotel_id',
        'supplier_id',
        'order_number',
        'tax_date',
        'payment_terms',
        'delivery_date',
        'status',
        'subtotal',
        'vat_total',
        'total_amount',
        'generated_by',
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

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
    
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function generatedBy() {
        return $this->belongsTo(User::class, 'generated_by');
    }
    
    public function addedToDailyLposBy() {
        return $this->belongsTo(User::class, 'added_to_daily_lpos_by');
    }
    
    public function approvedBy() {
        return $this->belongsTo(User::class, 'approved_by');
    }
    
    public function invoiceAttachedBy() {
        return $this->belongsTo(User::class, 'invoice_attached_by');
    }
    
    public function lpoItems()
    {
        return $this->hasMany(LpoItem::class);
    }
}
