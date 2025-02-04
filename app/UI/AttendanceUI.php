<?php

namespace App\UI;

use App\Models\Student;
use App\UI\Traits\CommonTrait;

class AttendanceUI extends BaseUI
{
    public $select = "*";

    public $route = 'attendances';

    public $columns = ['date' => 'Date', 'time' => 'Time', 'student' => 'Student', 'subject' => 'Subject'];

    public $permissions = [
        'index' => 'Manage Assignments',
        'create' => 'Create Assignments',
        'edit' => 'Edit Assignments',
        'store' => 'Create Assignments',
        'update' => 'Edit Assignments',
        'destroy' => 'Delete Assignments',
        'status' => 'Edit Assignments'
    ];

    public $with = [];

    public function getActions()
    {
        return [
            'edit' => [
                'icon' => 'bi bi-pencil text-primary',
                'permission' => $this->permissions['edit'],
                'route' => "admin.$this->route.edit",
            ],
            'delete' => [
                'permission' => $this->permissions['destroy'],
                'route' => "admin.$this->route.destroy",
            ]
        ];
    }

    public function createAction()
    {
        return [
            'permission' => $this->permissions['create'],
            'route' => "admin.$this->route.create"
        ];
    }

    public $rules = [
        'store' => [

        ],
        'update' => [

        ]
    ];
    public function getMessages()
    {
        return [
            'required' => 'This field is required'
        ];
    }
    public function student($model)
    {
        return $model->studentSubject->student->name;
    }

    public function time($model)
    {
        return $model->created_at->format('H:i:s');
    }
    public function subject($model)
    {
        return $model->studentSubject->teacherSubject->subject->name;
    }
}
