<?php

namespace App\UI;

use App\UI\Traits\CommonTrait;

class SubjectUI extends BaseUI
{
    public $select = "*";

    public $route = '';

    public $columns = [];

    public $permissions = [
        'index' => 'Manage Permissions',
        'create' => 'Create Permissions',
        'edit' => 'Edit Permissions',
        'store' => 'Create Permissions',
        'update' => 'Edit Permissions',
        'destroy' => 'Delete Permissions',
        'status' => 'Edit Permissions'
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
