<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',   // Reference to the invoice number
        'lpo_item_number',
        'quantity_delivered',
        'quantity_pending',
        'invoice_amount',
    ];


    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_number', 'invoice_number');
    }

    public function lpoItem()
    {
        return $this->belongsTo(LpoItem::class, 'lpo_item_number', 'lpo_item_number');
    }
}
