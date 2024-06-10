<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'profile_photo_path',
        'user_bio',
        'phone_no',
        'gender',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
