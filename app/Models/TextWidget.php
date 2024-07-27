<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TextWidget extends Model
{
    protected $fillable = [
        'key',
        'title_kk',
        'title_ru',
        'content_kk',
        'content_ru',
        'active'
    ];

}
