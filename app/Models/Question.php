<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'question',
        'option-I',
        'option-II',
        'option-III',
        'option-IV',
        'answer',
    ];
}
