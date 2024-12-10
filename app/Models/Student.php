<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Student extends BaseModel
{
    use SoftDeletes, HasTranslations;

    protected $table = "";

    protected $fillable = [];

    public $translatable = [];
}
