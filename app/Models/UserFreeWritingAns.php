<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFreeWritingAns extends Model
{
    public function question(){
        return $this->belongsTo(QuizQuestion::class,'quiz_question_id');
    }
    public function interview_user(){
        return $this->belongsTo(InterviewUser::class,'interview_user_id');
    }
}
