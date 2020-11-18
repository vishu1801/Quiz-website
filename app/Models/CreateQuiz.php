<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateQuiz extends Model
{
    use HasFactory;

    protected $table = 'createquiz';

    protected $fillable = [
        'user_id',
        'quiz_title',
        'quiz_image'=>'nullable',
        'quiz_description'=>'nullable',
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
