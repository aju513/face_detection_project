<?php

namespace App\Repositories\Admin;

use App\Helpers\ImageHelper;
use App\Models\Teacher;
use App\Models\User;
use App\Repositories\Common\Traits\CommonRepositoryTrait;
use App\Repositories\Common\Traits\CrudRepositoryTrait;
use App\Repositories\Common\Traits\SearchRepositoryTrait;

class TeacherRepository
{
    use CommonRepositoryTrait, CrudRepositoryTrait, SearchRepositoryTrait;

    protected $model, $imageHelper, $user;

    public function __construct(Teacher $model, ImageHelper $imageHelper, User $user)
    {
        $this->model = $model;
        $this->imageHelper = $imageHelper;
        $this->user = $user;
    }
    public function store($data)
    {
        if (isset($data['photo']) && $data['photo']->isValid()) {
            $directory = storage_path('app/public/' . Teacher::IMG_PATH . '/');

            $filename = $this->imageHelper->resizeCropImages(800, 600, $data['photo'], $directory);
            $data['photo'] = $filename;
        }

        $model = $this->model->create($data);

        $user = $this->user->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'memberable_id' => $model->id,
            'memberable_type' => get_class($model),
        ]);
        
        $user->assignRole(2);
        return $model;
    }
}
