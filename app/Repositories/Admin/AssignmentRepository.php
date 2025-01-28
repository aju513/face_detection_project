<?php

namespace App\Repositories\Admin;

use App\Models\Assignment;
use App\Repositories\Common\Traits\CommonRepositoryTrait;
use App\Repositories\Common\Traits\CrudRepositoryTrait;
use App\Repositories\Common\Traits\SearchRepositoryTrait;

class AssignmentRepository
{
    use CommonRepositoryTrait, CrudRepositoryTrait, SearchRepositoryTrait;

    protected $model;

    public function __construct(Assignment $model)
    {
        $this->model = $model;
    }

}
