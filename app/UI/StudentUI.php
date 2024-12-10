<?php

namespace App\UI;

use App\UI\Traits\CommonTrait;

class StudentUI extends BaseUI
{
    public $select = "*";

    public $route = 'students';

    public $columns = [];

    public $permissions = [
        'index' => 'Manage Students',
        'create' => 'Create Students',
        'edit' => 'Edit Students',
        'store' => 'Create Students',
        'update' => 'Edit Students',
        'destroy' => 'Delete Students',
        'status' => 'Edit Students'
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
}
