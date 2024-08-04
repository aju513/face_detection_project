<?php

namespace App\Repositories\Admin;

use App\Repositories\Common\Traits\CommonRepositoryTrait;
use App\Repositories\Common\Traits\CrudRepositoryTrait;
use App\Repositories\Common\Traits\SearchRepositoryTrait;
use Spatie\Activitylog\Models\Activity;

class ActivityRepository
{
    use CommonRepositoryTrait, CrudRepositoryTrait, SearchRepositoryTrait;

    protected $model;

    public function __construct(Activity $model)
    {
        $this->model = $model;
    }

    public function scope()
    {
        $this->model = $this->model->orderBy('created_at', 'desc');
        return $this;
    }
}
