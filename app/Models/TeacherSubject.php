<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class TeacherSubject extends BaseModel
{
    use HasTranslations;

    protected $table = "teacher_subjects";

    protected $fillable = ['teacher_id', 'subject_id', 'days_of_week', 'start_time', 'end_time'];

    public $translatable = [];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
    public function studentSubjects()
    {
        return $this->hasMany(StudentSubject::class);
    }
}
