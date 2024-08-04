<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Country extends BaseModel
{
    use SoftDeletes, HasTranslations;

    protected $table = "countries";

    protected $fillable = [
        'country_code',    'nepali_name',    'english_name'
    ];

    public $translatable = [];
}
