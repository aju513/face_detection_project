<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as BasePermission;

class Permission extends BasePermission
{
    protected $table = "permissions";

    protected $fillable = [
        'name',
        'guard_name',
    ];
}
