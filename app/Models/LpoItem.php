<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LpoItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'lpo_item_number',
        'lpo_order_number',
        'item_name',
        'description',
        'expected_quantity',
        'delivered_quantity',
        'pending_quantity',
        'unit_of_measure',
        'price',
        'vat',
        'amount',
        'is_saved',
        'is_delivered',
        'is_pending',
    ];


    public function lpo()
    {
        return $this->belongsTo(Lpo::class, 'lpo_order_number', 'lpo_order_number');
    }

    // Many-to-many relationship with Invoice
    // public function invoices()
    // {
    //     return $this->belongsToMany(Invoice::class, 'invoice_lpo_items', 'lpo_item_number', 'invoice_number')
    //         ->withPivot('delivered_quantity', 'pending_quantity')
    //         ->withTimestamps();
    // }

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class, 'lpo_item_number', 'item_number');
    }
}
