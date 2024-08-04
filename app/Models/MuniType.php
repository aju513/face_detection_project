<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class MuniType extends BaseModel
{
    use SoftDeletes, HasTranslations;

    protected $table = "muni_types";

    protected $fillable = ['muni_type_name'];

    public $translatable = [];
}
