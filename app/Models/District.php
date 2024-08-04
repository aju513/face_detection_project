<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class District extends BaseModel
{
    use SoftDeletes, HasTranslations;

    protected $table = "districts";

    protected $fillable = [
        'province_id', 'district_code', 'nepali_name', 'english_name',
    ];

    public $translatable = [];
}
