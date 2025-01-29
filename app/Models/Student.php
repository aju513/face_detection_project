<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Student extends BaseModel
{
    use SoftDeletes, HasTranslations;

    protected $table = "students";

    protected $fillable = ['name', 'email', 'photo', 'encodings'];

    public $translatable = [];
    const IMG_PATH = 'students';

    public function studentSubject()
    {
        return $this->hasMany(StudentSubject::class);
    }
}
