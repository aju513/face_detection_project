<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Teacher extends BaseModel
{
    use HasTranslations;

    protected $table = "teachers";

    protected $fillable = ['name', 'phone_no', 'email', 'photo'];

    public $translatable = [];

    const IMG_PATH = 'teachers';
}
