<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\TeacherSubject;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Assignment extends BaseModel
{
    use HasTranslations;

    protected $table = "assignments";

    protected $fillable = [
        'teacher_subject_id',
        'title',
        'url',
        'deadline',
    ];

    public $translatable = [];

    /**
     * Relationship with the TeacherSubject model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacherSubject()
    {
        return $this->belongsTo(TeacherSubject::class, 'teacher_subject_id');
    }

    /**
     * Get the URL attribute with storage path if applicable.
     *
     * @return string|null
     */

}
