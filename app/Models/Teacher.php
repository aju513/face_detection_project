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

    public function teacherSubjects()
    {
        return $this->hasMany(TeacherSubject::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subjects', 'teacher_id', 'subject_id')
            ->withPivot('days_of_week', 'start_time', 'end_time');
    }
    public function user()
    {
        return $this->morphOne(User::class, 'memberable');
    }

}
