<?php

namespace App\UI;

use App\UI\Traits\CommonTrait;
use Illuminate\Support\Facades\Cache;

class UserUI extends BaseUI
{
    public $select = "*";

    public $route = 'users';

    public $columns = [       
        'name' => 'Name',
        'email' => 'Email',
        'roles' => 'Roles',       
        'status' => 'Status',        
    ];

    public $permissions = [
        'index' => 'Manage Users',
        'create' => 'Create Users',
        'edit' => 'Edit Users',
        'store' => 'Create Users',
        'update' => 'Edit Users',
        'destroy' => 'Delete Users',
        'status' => 'Edit Users'
    ];

    public $with = [];

    public function getActions()
    {
        return [
            'status' => [
                'placeholder' => 'Change Status',
                'permission' => $this->permissions['status'],
                'route' => "admin.$this->route.status",
            ],
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
            'name' => 'required|max:255',
            'designation' => 'nullable|string|max:255',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|max:255|confirmed',
            'roles' => 'array|nullable',           
        ],
        'update' => [
            'name' => 'required|max:255',
            'designation' => 'nullable|max:255',
            'roles' => 'array|nullable',            
        ]
    ];
    public function getMessages()
    {
        return [
            'required' => 'This field is required'
        ];
    }    

    public function roles($model)
    {
        return implode(',', $model->roles->pluck('name')->toArray());
    }

    public function status($model)
    {
        return view('admin.layouts.components.status', ['model' => $model]);
    }
    
    public function login($model)
    {
        $online = false;
        if (Cache::has('user-is-online-' . $model->id)) {
            $online = true;
        }
        return view('admin.layouts.components.online', ['online' => $online]);
    }

    public function getChangePasswordRules()
    {
        return [
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function getProfileUpdateRules()
    {
        return [
            'name' => 'required|max:255',
            'designation' => 'nullable|max:255',
        ];
    }
}
