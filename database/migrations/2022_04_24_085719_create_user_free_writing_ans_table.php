<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFreeWritingAnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_free_writing_ans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('interview_user_id');
            $table->unsignedBigInteger('quiz_question_id');
            $table->longText('answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_free_writing_ans');
    }
}
