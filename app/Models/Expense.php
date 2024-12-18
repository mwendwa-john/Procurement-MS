<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'item_name',
        'amount',
        'description',
        'unit_of_measure',
        'quantity',
        'supplier_number',
        'expense_category_code',
    ];


    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_number', 'supplier_number');
    }


    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category_code', 'category_code');
    }
}
