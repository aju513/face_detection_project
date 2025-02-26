<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "medias";
    protected $fillable = [
        'media_id',
        'url',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
