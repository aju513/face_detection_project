<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class StudentSubject extends BaseModel
{
    use HasTranslations;

    protected $table = "student_subjects";

    protected $fillable = ['student_id', 'teacher_subject_id'];

    public $translatable = [];
}
