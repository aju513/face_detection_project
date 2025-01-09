<?php

namespace App\UI;

use App\UI\Traits\CommonTrait;

class StudentSubjectUI extends BaseUI
{
    public $select = "*";

    public $route = 'student-subjects';

    public $columns = [];

    public $permissions = [
        'index' => 'Manage StudentSubject',
        'create' => 'Create StudentSubject',
        'edit' => 'Edit StudentSubject',
        'store' => 'Create StudentSubject',
        'update' => 'Edit StudentSubject',
        'destroy' => 'Delete StudentSubject',
        'status' => 'Edit StudentSubject'
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
            'student_id' => 'required',
            'teacher_subject_id' => 'required',
        ],
        'update' => [
            'student_id' => 'required',
            'teacher_subject_id' => 'required',
        ]
    ];
    public function getMessages()
    {
        return [
            'required' => 'This field is required'
        ];
    }
}
