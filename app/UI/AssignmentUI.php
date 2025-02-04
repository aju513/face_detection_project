<?php

namespace App\UI;

use App\UI\Traits\CommonTrait;

class AssignmentUI extends BaseUI
{
    public $select = "*";

    public $route = 'assignments';

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
            'url' => ['nullable', 'url'],
            'deadline' => ['required', 'date'],
        ],
        'update' => [
            'teacher_subject_id' => ['required', 'exists:teacher_subjects,id'],
            'title' => ['required', 'string', 'max:255'],
            'url' => ['nullable', 'url'],
            'deadline' => ['required', 'date'],
        ],
    ];

    /**
     * Custom validation messages.
     *
     * @return array
     */
    public function getMessages()
    {
        return [
            'teacher_subject_id.required' => 'The teacher subject field is required.',
            'teacher_subject_id.exists' => 'The selected teacher subject is invalid.',
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'url.url' => 'The URL must be a valid URL.',
            'deadline.required' => 'The deadline field is required.',
            'deadline.date' => 'The deadline must be a valid date.',
        ];
    }
}
