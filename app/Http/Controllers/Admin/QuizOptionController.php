<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\QuizOption;
use App\QuizQuestion;
use DB;
class QuizOptionController extends Controller
{
  public function QuizOptionCreate($id)
  {
      $id = $id;
      $allOption = DB::table('quiz_options')->where('question_no', $id)->get();
      if($allOption){
        return view('admin.quiz_option.create', compact('id', 'allOption'));
      }
      else {
        $allOption = 0;
        return view('admin.quiz_option.create', compact('id', 'allOption'));
      }

  }
  public function QuizOptionStore(Request $request, $id){

      $id = $request->quiz_id;
      $data = DB::table('quiz_options')->where('question_no', $id)->get();
      $data_answer = DB::table('quiz_answers')->where('question_no', $id)->first();

      if(count($data) > 0 ){
      $todate = date('Y-m-d');

      foreach($data as $key=>$item){
              $option = QuizOption::find($item->id);
              $option->question_no     = $request->quiz_id;
              $option->answer_option    = $request->answer_option[$key];
              $option->order_id         = $item->id + 1;
              $option->created_at        = $todate;
              $option->created_by      = 2;
              $option->updated_at       = $todate;
              $option->updated_by       = 1;
              $option->update();
              if (isset($data_answer->option_no) && $item->id == $data_answer->option_no) {
                  // $data_answer->update();
                  DB::table('quiz_answers')->where('question_no', $id)->update([
                      'answer' => $option->answer_option,
                    ]);
                    // dd($data_answer->answer, $option->answer_option );

              }
      }


      $notification = array('message' => 'Question Answer Options Updated Successfully.','alert-type' => 'success',);
      return redirect()->route('question.index')->with($notification);
      }
      else {
      $todate = date('Y-m-d');
    for($i = 0; $i < sizeof($request->answer_option); $i++)
    {
        // $quiz = new QuizOption();
        //     $quiz->question_no   = $request->id;
        //     $quiz->answer_option = $request->answer_option[$i];
        //     $quiz->order_id   = $i;
        //     $quiz->created_at = $todate;
        //     $quiz->created_by = $todate;
        //     $quiz->updated_at = $todate;
        //     $quiz->updated_by = $todate;
        //     $quiz->save();

            $data = array();
            $data['question_no']       = $request->id;
            $data['answer_option']     = $request->answer_option[$i];
            $data['order_id']          = $i;
            $data['created_at']        = $todate;
            $data['created_by']        = 2;
            $data['updated_at']        = $todate;
            $data['updated_by']        = 1;
            DB::table('quiz_options')->insert($data);
    }
    $notification = array('message' => 'Question Answer Options Add Successfully.','alert-type' => 'success',);
    return redirect()->route('question.index')->with($notification);
    }

  }

  public function QuizOptionEdit()
  {
      $question    = DB::table('quiz_questions')->get();
      return view('admin.quiz_option.edit', compact('question'));
  }
}
