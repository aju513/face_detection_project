<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends BaseModel
{
    use SoftDeletes;
    
    protected $table = "web_settings";

    protected $casts = [
        'values' => 'json'
    ];

    protected $fillable = [
        'name',
        'display_name',
        'permission',       
        'values',
        'display_order'
    ];
}
