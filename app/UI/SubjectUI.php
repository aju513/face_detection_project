<?php

namespace App\UI;

use App\UI\Traits\CommonTrait;

class SubjectUI extends BaseUI
{
    public $select = "*";

    public $route = 'subjects';

    public $columns = ['name' => 'Name', 'code' => 'Code'];

    public $permissions = [
        'index' => 'Manage Subject',
        'create' => 'Create Subject',
        'edit' => 'Edit Subject',
        'store' => 'Create Subject',
        'update' => 'Edit Subject',
        'destroy' => 'Delete Subject',
        'status' => 'Edit Subject'
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
            'name' => 'required|string|max:50|min:0',
            'code' => 'required|string|max:50|min:0'
        ],
        'update' => [
            'name' => 'required|string|max:50|min:0',
            'code' => 'required|string|max:50|min:0'
        ]
    ];
    public function getMessages()
    {
        return [
            'required' => 'This field is required'
        ];
    }
}
