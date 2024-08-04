<?php

namespace App\UI;

use App\UI\Traits\CommonTrait;

class BaseUI
{
    use CommonTrait;

    public $route = "";

    public $prefix = "admin";

    public $columns = [];

    public $rules = [
        'store' => [],
        'update' => []
    ];

    public $with = [];

    public $addanother = false;

    public $createBtn = "Add";

    public $saveBtn = "Save";

    public $permissions = [
        'index' => '',
        'create' => '',
        'edit' => '',
        'store' => '',
        'update' => '',
        'status' => ''
    ];
}
