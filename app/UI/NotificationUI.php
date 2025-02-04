<?php

namespace App\UI;

use App\UI\Traits\CommonTrait;

class NotificationUI extends BaseUI
{
    public $select = "*";

    public $route = 'notifications';

    public $columns = ['title' => 'Title'];

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
            'teacher_subject_id' => ['required', 'exists :teacher_subjects,id'],
            'title' => ['required', 'string', 'max:255'],
            'details' => ['required', 'string', 'max:255'],
        ],
        'update' => [
            'teacher_subject_id' => ['required', 'exists :teacher_subjects,id'],
            'title' => ['required', 'string', 'max:255'],
            'details' => ['required', 'string', 'max:255'],
        ]
    ];
    public function getMessages()
    {
        return [
            'required' => 'This field is required'
        ];
    }
}
