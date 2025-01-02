<?php

namespace App\Repositories\Admin;

use App\Models\StudentSubject;
use App\Repositories\Common\Traits\CommonRepositoryTrait;
use App\Repositories\Common\Traits\CrudRepositoryTrait;
use App\Repositories\Common\Traits\SearchRepositoryTrait;

class StudentSubjectRepository
{
    use CommonRepositoryTrait, CrudRepositoryTrait, SearchRepositoryTrait;

    protected $model;

    public function __construct(StudentSubject $model)
    {
        $this->model = $model;
    }
}
