<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'from',
        'to',
        'description_kk',
        'description_ru',
        'description_en',
    ];
}
