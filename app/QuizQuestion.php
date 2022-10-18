<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\QuizOption;
class QuizQuestion extends Model
{
    //
    public function quizOptions()
    {
        return $this->hasMany(QuizOption::class, 'id', 'question_no');
    }
}
