<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "language","question","answer","sort",
    ];
}
