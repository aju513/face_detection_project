<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Subject extends BaseModel
{
    use SoftDeletes, HasTranslations;

    protected $table = "subjects";

    protected $fillable = ['name', 'code'];

    public $translatable = [];
}
