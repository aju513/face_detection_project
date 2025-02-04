<?php

namespace App\UI;

use App\UI\Traits\CommonTrait;

class TeacherUI extends BaseUI
{
    public $select = "*";

    public $route = 'teachers';

    public $columns = ["name" => "Name", "email" => "Email"];

    public $permissions = [
        'index' => 'Manage Teachers',
        'create' => 'Create Teachers',
        'edit' => 'Edit Teachers',
        'store' => 'Create Teachers',
        'update' => 'Edit Teachers',
        'destroy' => 'Delete Teachers',
        'status' => 'Edit Teachers'
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'photo' => 'required',
            'phone_no' => 'required'
        ],
        'update' => [
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'photo' => 'nullable',
            'phone_no' => 'required'
        ]
    ];
    public function getMessages()
    {
        return [
            'required' => 'This field is required'
        ];
    }
}
