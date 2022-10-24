<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class QuizOption extends Model
{
    //

    public function quizQuestion()
    {
        return $this->belongsTo(QuizQuestion::class);
    }
}
