<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Attendance extends BaseModel
{
    use HasTranslations;

    protected $table = "attendances";

    protected $fillable = ['student_subject_id', 'date', 'status'];

    public $translatable = [];
}
