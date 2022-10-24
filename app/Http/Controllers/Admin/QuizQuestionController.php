<?php

namespace App\Http\Controllers\Admin;
use App\Models\QuizAnswer;
use App\Models\QuizOption;
use App\Models\QuizQuestion;
use App\Models\UserCorrectAns;
use App\Models\UserQuizAnswer;
use App\Models\UserFreeWritingAns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class QuizQuestionController extends Controller
{
  public function index()
   {
      // $data = DB::table('quiz_questions')->orderBy('id', 'DESC')->get();
      // $data = DB::table('quiz_questions')->orderBy('id', 'DESC')->get();
      $data = QuizQuestion::orderBy('quiz_questions.id', 'DESC')->get();

      return view('admin.question.index', compact('data'));
   }

  public function create()
  {
      return view('admin.question.create');
  }

  public function store(Request $request)
   {
       $request->validate([
          'question'      => 'required',
          'question_type' => 'required',
          'order_num'     => 'required',
          'status'        => 'required',
       ]);

       $data = array();
       $data['question']      = $request->question;
       $data['question_type'] = $request->question_type;
       $data['order_id']      = $request->order_num;
       $data['status']        = $request->status;
       DB::table('quiz_questions')->insert($data);
       $notification = array('message' => 'Question Add Successfully.','alert-type' => 'success',);
       return redirect()->route('question.index')->with($notification);
   }

 public function edit($id)
  {
      $data = DB::table('quiz_questions')->where('id', $id)->first();
      $option = QuizOption::where('question_no',$data->id)->get();
      $answer = QuizAnswer::where('question_no',$data->id)->first();
      return view('admin.question.edit', compact('data','option','answer'));
  }

  public function update(Request $request, $id)
  {

       $data = array();
       $data['question']      = $request->question;
       $data['question_type'] = $request->question_type;
       $data['order_id']      = $request->order_num;
       $data['status']        = $request->status;
       DB::table('quiz_questions')->where('id', $id)->update($data);
       $answer = QuizAnswer::where('question_no',$id)->first();
       $question = QuizQuestion::find($id);

       if($answer){
           if($question->question_type==1){
                $option = QuizOption::find($request->question_option_id);
                $answer->question_no = $id;
                $answer->option_no = $request->question_option_id;
                $answer->answer = $option->answer_option;
                $answer->update();
           }elseif($question->question_type==3){
                $answer->question_no = $id;
                $answer->answer = $request->question_answer;
                $answer->update();
           }

       }else{
            if($question->question_type==1){
                $option = QuizOption::find($request->question_option_id);
                $answer =new QuizAnswer();
                $answer->question_no = $id;
                $answer->option_no = $request->question_option_id;
                $answer->answer = $option->answer_option;
                $answer->save();
            }elseif($question->question_type==3){
                $answer =new QuizAnswer();
                $answer->question_no = $id;
                $answer->answer = $request->question_answer;
                $answer->save();
           }
       }

       $notification = array('message' => 'Question Updated Successfully.','alert-type' => 'success',);
       return redirect()->route('question.index')->with($notification);
  }

 public function view($id)
  {
      $data = DB::table('quiz_questions')->where('id', $id)->first();
      return view('admin.question.view', compact('data'));
  }

  public function destroy($id)
  {

      $options = QuizOption::where('question_no',$id)->delete();
        QuizAnswer::where('question_no',$id)->delete();
         UserCorrectAns::where('quiz_question_id',$id)->delete();
       UserFreeWritingAns::where('quiz_question_id',$id)->delete();
       UserQuizAnswer::where('quiz_question_id',$id)->delete();
        $data = DB::table('quiz_questions')->where('id', $id)->delete();
      $notification = array('message' => 'Question Deleted Successfully.','alert-type' => 'success',);
      return redirect()->back()->with($notification);
  }


  public function QuizAnsIndex()
  {
      $data = DB::table('quiz_answers')
              ->leftjoin('quiz_questions', 'quiz_answers.question_no', 'quiz_questions.id')
              ->leftjoin('quiz_options', 'quiz_answers.option_no', 'quiz_options.id')
              ->select('quiz_answers.*', 'quiz_questions.question', 'quiz_options.answer_option')
              ->get();
      return view('admin.quiz_answer.index', compact('data'));
  }

  public function QuizAnsCreate()
  {
      $question    = DB::table('quiz_questions')->get();
      $quiz_option = DB::table('quiz_options')->get();
      return view('admin.quiz_answer.create', compact('question', 'quiz_option'));
  }

  public function QuizAnsEdit()
  {
      return view('admin.quiz_answer.edit');
  }

}
