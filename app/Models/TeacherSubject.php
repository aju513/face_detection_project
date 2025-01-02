<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class TeacherSubject extends BaseModel
{
    use SoftDeletes, HasTranslations;

    protected $table = "teacher_subjects";

    protected $fillable = ['teacher_id', 'subject_id', 'days_of_week', 'start_time', 'end_time'];

    public $translatable = [];
}
