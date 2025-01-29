<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Reschedule extends BaseModel
{
    use HasTranslations;

    protected $table = "reschedule";

    protected $fillable = ['teacher_subject_id', 'reschedule_date', 'new_start_time', 'new_end_time', 'reason'];

    public $translatable = [];
    public function teacherSubject()
    {
        return $this->belongsTo(TeacherSubject::class, 'teacher_subject_id');
    }

    /**
     * Access Teacher via TeacherSubject
     */
    public function teacher()
    {
        return $this->teacherSubject->teacher();
    }

    /**
     * Access Subject via TeacherSubject
     */
    public function subject()
    {
        return $this->teacherSubject->subject();
    }

}
