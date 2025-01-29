<?php

namespace App\Repositories\Admin;

use App\Models\TeacherSubject;
use App\Repositories\Common\Traits\CommonRepositoryTrait;
use App\Repositories\Common\Traits\CrudRepositoryTrait;
use App\Repositories\Common\Traits\SearchRepositoryTrait;

class TeacherSubjectRepository
{
    use CommonRepositoryTrait, CrudRepositoryTrait, SearchRepositoryTrait;

    protected $model;

    public function __construct(TeacherSubject $model)
    {
        $this->model = $model;
    }
    public function store($data)
    {
        $data['days_of_week'] = json_encode($data['days_of_week']);
        return $this->model->create($data);
    }
}
