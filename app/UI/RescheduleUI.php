<?php

namespace App\UI;

use App\UI\Traits\CommonTrait;

class RescheduleUI extends BaseUI
{
    public $select = "*";

    public $route = 'reschedules';

    public $columns = ['teacher' => 'Teacher', 'subject' => 'Subject'];

    public $permissions = [
        'index' => 'Manage Reschedule',
        'create' => 'Create Reschedule',
        'edit' => 'Edit Reschedule',
        'store' => 'Create Reschedule',
        'update' => 'Edit Reschedule',
        'destroy' => 'Delete Reschedule',
        'status' => 'Edit Reschedule'
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
            'teacher_subject_id' => 'required',
            'reschedule_date' => 'required',
            'new_end_time' => 'required',
            'new_start_time' => 'required',
            'reason' => 'nullable'
        ],
        'update' => [
            'teacher_subject_id' => 'required',
            'reschedule_date' => 'required',
            'new_end_time' => 'required',
            'new_start_time' => 'required',
            'reason' => 'nullable'
        ]
    ];
    public function getMessages()
    {
        return [
            'required' => 'This field is required'
        ];
    }
    public function teacher($model)
    {
        return $model->teacher?->name;
    }
    public function subject($model)
    {
        return $model->subject?->name;
    }
}
