<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
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
    
    
    
    /**
     * The "booted" method of the model. Excludes inactive users from any query
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('is_active', true);
        });
    }

    /**
     * Scope to include both active and inactive users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithInactive($query)
    {
        return $query->withoutGlobalScope('active');
    }


    public function getFullNameAttribute()
    {
        return trim("{$this->first_name} {$this->middle_name} {$this->last_name}");
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

    /**
     * Get the transfers associated with the user.
     */
    public function transfers()
    {
        return $this->hasMany(UserTransfer::class, 'user_slug', 'slug');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'payed_by');
    }

}
