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
        'invoice_number',
        'lpo_order_number',
        'hotel_id',
        'supplier_id',
        'parent_invoice_id',
        'delivery_date',
        'comments',
        'status',
        'subtotal',
        'vat_total',
        'total_amount',
        'invoice_attached_by',
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

    public function lpo()
    {
        return $this->belongsTo(Lpo::class, 'lpo_order_number', 'lpo_order_number');
    }

    // Recursive relationship for parent invoice
    public function parentInvoice()
    {
        return $this->belongsTo(Invoice::class, 'parent_invoice_id');
    }

    // Recursive relationship for child invoices
    public function childInvoices()
    {
        return $this->hasMany(Invoice::class, 'parent_invoice_id');
    }

    
    public function invoiceAttachedBy()
    {
        return $this->belongsTo(User::class, 'invoice_attached_by');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }


    // Many-to-many relationship with LpoItem
    // public function lpoItems()
    // {
    //     return $this->belongsToMany(LpoItem::class, 'invoice_lpo_items', 'invoice_number', 'lpo_item_number')
    //         ->withPivot('delivered_quantity', 'pending_quantity')
    //         ->withTimestamps();
    // }

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class, 'invoice_number', 'invoice_number');
    }
}
