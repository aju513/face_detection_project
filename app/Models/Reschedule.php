<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Reschedule extends BaseModel
{
    use SoftDeletes, HasTranslations;

    protected $table = "reschedule";

    protected $fillable = ['teacher_subject_id', 'reschedule_date', 'new_start_time', 'new_end_time', 'reason'];

    public $translatable = [];
}
