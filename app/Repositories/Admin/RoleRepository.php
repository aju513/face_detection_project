<?php

namespace App\Repositories\Admin;

use App\Models\Role;
use App\Repositories\Common\Traits\CommonRepositoryTrait;
use App\Repositories\Common\Traits\CrudRepositoryTrait;
use App\Repositories\Common\Traits\SearchRepositoryTrait;

class RoleRepository
{
    use CommonRepositoryTrait, CrudRepositoryTrait, SearchRepositoryTrait;

    protected $model;

    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function store($data)
    {
        $permissions = $data['permissions'] ?? [];
        unset($data['permissions']);
        $model = $this->model->create($data);
        $model->permissions()->sync($permissions);
        return $model;
    }

    // public function scope()
    // {
    //     $this->model = $this->model->where('id', '!=', 1);
    //     return $this;
    // }
}
