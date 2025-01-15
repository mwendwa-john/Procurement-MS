<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTransfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_slug',
        'from_location',
        'to_location',
        'from_hotel',
        'to_hotel',
        'transfer_date',
        'transfer_reason',
        'from_role',
        'to_role'
    ];



    /**
     * Get the user associated with the transfer.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_slug', 'slug');
    }

}
