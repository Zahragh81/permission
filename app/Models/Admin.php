<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Admin extends User
{
    protected $gaurd_name = 'web';

    protected static function booted(): void
    {
        Relation::morphMap([
            User::class => self::class
        ]);

        static::addGlobalScope('admin', function (Builder $builder) {
            $builder->whereHas('roles', function ($role) {
                $role->where('role_group_id', 1);
            });
        });
    }
}
