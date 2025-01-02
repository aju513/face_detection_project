<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Subject extends BaseModel
{
    use HasTranslations;

    protected $table = "subjects";

    protected $fillable = ['name', 'code'];

    public $translatable = [];

    public function teacherSubjects()
    {
        return $this->hasMany(TeacherSubject::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_subjects', 'subject_id', 'teacher_id')
            ->withPivot('days_of_week', 'start_time', 'end_time');
    }
}
