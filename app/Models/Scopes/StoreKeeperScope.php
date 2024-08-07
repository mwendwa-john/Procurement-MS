<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class StoreKeeperScope implements Scope
{
    protected $userId;
    protected $userRole;

    public function __construct($userId, $userRole)
    {
        $this->userId = $userId;
        $this->userRole = $userRole;
    }

    public function apply(Builder $builder, Model $model)
    {
        if ($this->userRole === 'store-keeper') {
            // Apply the filtering to show records for the hotels associated with the store-keeper
            $builder->whereHas('hotel', function (Builder $query) {
                $query->whereHas('users', function (Builder $query) {
                    $query->where('id', $this->userId);
                });
            })->with('hotel'); // Automatically load related hotels
        }
    }
}
