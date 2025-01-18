<?php

namespace App\UI;

use App\UI\Traits\CommonTrait;

class TeacherSubjectUI extends BaseUI
{
    public $select = "*";

    public $route = 'teacher-subjects';

    public $columns = ['teacher' => 'Teacher', 'subject' => 'Subject'];

    public $permissions = [
        'index' => 'Manage TeacherSubject',
        'create' => 'Create TeacherSubject',
        'edit' => 'Edit TeacherSubject',
        'store' => 'Create TeacherSubject',
        'update' => 'Edit TeacherSubject',
        'destroy' => 'Delete TeacherSubject',
        'status' => 'Edit TeacherSubject'
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
            'teacher_id' => 'required|exists:teachers,id',
            'subject_id' => 'required|exists:subjects,id',
            'days_of_week' => 'required',
            'start_time' => 'required ',
            'end_time' => 'required ',
        ],
        'update' => [
            'teacher_id' => 'sometimes|required|exists:teachers,id',
            'subject_id' => 'sometimes|required|exists:subjects,id',
            'days_of_week' => 'sometimes|required',
            'start_time' => 'sometimes|required ',
            'end_time' => 'sometimes|required',
        ]
    ];

    public function getMessages()
    {
        return [
            'required' => 'This field is required.',
            'exists' => 'The selected :attribute is invalid.',
            'json' => 'The :attribute must be a valid JSON string.',
            'date_format' => 'The :attribute must be in the format HH:MM.',
            'end_time.after' => 'The end time must be after the start time.',
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
