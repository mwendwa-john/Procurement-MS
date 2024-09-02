<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'first_name',
        'middle_name',
        'last_name',
        'slug',
        'location_id',
        'hotel_id',
        'email',
        'password',
        'is_active',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    // relationship with person
    public function person()
    {
        return $this->hasOne(Person::class);
    }
    
    // relationship with location
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    // relationship with hotel
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'payed_by');
    }

}
