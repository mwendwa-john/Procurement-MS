<?php

namespace App\Models;

use App\Models\Scopes\StoreKeeperScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'added_to_cart',
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


    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class, 'invoice_number', 'invoice_number');
    }


    public function payments(): BelongsToMany
    {
        return $this->belongsToMany(Payment::class, 'invoice_payment', 'invoice_number', 'payment_number')
                    ->withPivot('amount_paid', 'invoice_balance')
                    ->withTimestamps();
    }
}
