<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuizAnswer extends Model
{
    public function question(){
        return $this->belongsTo(QuizQuestion::class,'quiz_question_id');
    }
    public function quiz_answer(){
        return $this->belongsTo(QuizOption::class,'quiz_answer_id');
    }
}
