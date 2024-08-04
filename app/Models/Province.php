<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Province extends BaseModel
{
    use SoftDeletes, HasTranslations;

    protected $table = "provinces";

    protected $fillable = [
        'province_code', 'nepali_name', 'english_name',
    ];

    public $translatable = [];
}
