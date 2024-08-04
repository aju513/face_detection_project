<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Municipality extends BaseModel
{
    use SoftDeletes, HasTranslations;

    protected $table = "municipalities";

    protected $fillable = [
        'muni_type_id', 'district_id', 'muni_code', 'muni_name', 'muni_name_en'
    ];

    public $translatable = [];
}
