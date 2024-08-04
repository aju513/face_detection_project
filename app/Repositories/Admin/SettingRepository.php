<?php

namespace App\Repositories\Admin;

use App\Models\Setting;
use App\Repositories\Common\Traits\CommonRepositoryTrait;
use App\Repositories\Common\Traits\CrudRepositoryTrait;
use App\Repositories\Common\Traits\SearchRepositoryTrait;

class SettingRepository
{
    use CommonRepositoryTrait,CrudRepositoryTrait,SearchRepositoryTrait;

    protected $model;

    public function __construct(Setting $model)
    {
        $this->model = $model;
    }

    public function find($name)
    {
        return $this->model->where('name',$name)->first();
    }
}
