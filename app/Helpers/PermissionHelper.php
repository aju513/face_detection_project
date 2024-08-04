<?php

namespace App\Helpers;

use Spatie\Permission\Models\Permission;

class PermissionHelper
{
    protected $model;

    public function __construct(Permission $model)
    {
        $this->model = $model;
    }

    public function dropdown()
    {
        return $this->model->get();
    }

    public function selected($permissions)
    {
        return $permissions->pluck('id')->toArray();
    }
}
