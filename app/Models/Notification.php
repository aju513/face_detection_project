<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Notification extends BaseModel
{
    use HasTranslations;

    protected $table = "attendex_notifications";

    protected $fillable = ['title', 'teacher_subject_id', 'details'];


    public $translatable = [];
    public function teacherSubject()
    {
        return $this->belongsTo(TeacherSubject::class, 'teacher_subject_id');
    }
}
