<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    protected $fillable = [
        'quiz_id',
        'user_id',
        'answers',
    ];

    public function createquiz() {
        return $this->belongsTo('App\Models\CreateQuiz','quiz_id');
    }

    public function users() {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
