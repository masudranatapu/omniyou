<?php

namespace App\Http\Controllers;

use App\Models\InterviewUser;
use App\Models\QuizAnswer;
use App\Models\QuizQuestion;
use App\Models\UserCorrectAns;
use App\Models\UserFreeWritingAns;
use Illuminate\Http\Request;
use App\Models\UserQuizAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function quizTwo(Request $request, $step)
    {

        // dd($step);
        // return response()->json()
        if (Session::has('course')) {
            $course_id = Session::get('course');
        } else {
            $notification = array('message' => 'Please choose a course.', 'alert-type' => 'error',);
            return redirect()->route('home')->with($notification);
        }
        // $qc = QuizQuestion::where('status', 1)->where('course_id', $course_id)->count();
        // dd($qc);
        if ($step == 1) {
            $quiz = QuizQuestion::where('status', 1)->where('course_id', $course_id)->take(1)->get();
            $next_quiz = QuizQuestion::where('status', 1)->where('course_id', $course_id)->first();
            Session::put('quiz_question_id', $next_quiz->id);
            $step = 2;
            return view('front.index', compact('quiz', 'step'));
        }
        $step = $step + 1;
        $quiz_last = QuizQuestion::orderBy('id', 'desc')->where('status', 1)->where('course_id', $course_id)->first();
        $quiz_question_id = Session::get('quiz_question_id');
        $quiz = QuizQuestion::where('status', 1)->where('course_id', $course_id)->where('id', '>', $quiz_question_id)->take(1)->get();
        $next_quiz = QuizQuestion::where('status', 1)->where('course_id', $course_id)->where('id', '>', $quiz_question_id)->first();


        if ($quiz_last->id == $quiz_question_id) {
            // Session::forget('quiz_question_id');
            $interview_user = InterviewUser::where('student_id', Auth::user()->id)->where('course_id', $course_id)->first();
            $interview_attempt = $interview_user->attempt;
            $question = QuizQuestion::where('status', 1)->where('course_id', $course_id)->count();
            $correct_ans = UserCorrectAns::where('interview_user_id', Auth::user()->id)
                ->where('quiz_course_id', $course_id)
                ->where('quiz_attempt', $interview_attempt)->count();
            // dd($correct_ans);
            $marks = 100 * $correct_ans / $question;
            // dd($marks);
            if ($marks >= 70) {
                $interview_user->status = 1;
                $interview_user->marks = $marks;
                $interview_user->update();
                return view('success', compact('question', 'correct_ans', 'marks'));
            } else {
                if ($interview_user->attempt == 10) {
                    $interview_user->status = 2;
                    $interview_user->marks = $marks;
                    $interview_user->update();
                }
                $interview_user->marks = $marks;
                $interview_user->update();
                Session::forget('interview_user_id');
                return view('fail_page');
            }
        } else {
            Session::put('quiz_question_id', $next_quiz->id);
            return view('front.index', compact('quiz', 'step'));
        }
    }
    public function quizThree()
    {
        return view('a.quiz_three');
    }
    public function quizFour()
    {
        $quiz_question_id = Session::get('quiz_question_id');
        $quiz_last = QuizQuestion::orderBy('id', 'desc')->where('status', 1)->where('question_type', 3)->first();
        $quiz = QuizQuestion::where('status', 1)->where('id', '>', $quiz_question_id)->where('question_type', 3)->take(1)->get();
        if ($quiz_last->id == $quiz_question_id) {
            $quiz = QuizQuestion::where('status', 1)->where('question_type', 3)->get();
            return view('success_writing', compact('quiz'));
        }
        return view('a.quiz_four', compact('quiz'));
    }
    public function quizFive()
    {
        return view('a.quiz_five');
    }
    public function quizSix()
    {
        return view('a.quiz_six');
    }
    public function quizSeven()
    {
        return view('a.quiz_seven');
    }
    public function quizEight()
    {
        return view('a.quiz_eight');
    }
    public function quizNine()
    {
        return view('a.quiz_nine');
    }
    public function quizTen()
    {
        return view('a.quiz_ten');
    }

    public function quizEleven()
    {
        return view('b.quiz_eleven');
    }

    public function SuccessPage()
    {
        return view('success');
    }
    public function start_quiz(Request $request)
    {
        $step = 1;
        $course = $request->course_id;
        if ($course) {
            Session::put('course', $course);
        } else {
            $notification = array('message' => 'Please choose a course.', 'alert-type' => 'error',);
            return redirect()->back()->with($notification);
        }


        $start_quiz = InterviewUser::where('student_id', Auth::user()->id)->where('course_id', $request->course_id)->first();

        if ($start_quiz) {
            if ($start_quiz->status == 2) {
                $notification = array('message' => 'You already faild this exam :( .', 'alert-type' => 'error',);
                return redirect()->back()->with($notification);
            }
            if ($start_quiz->status == 1) {
                $notification = array('message' => 'You already passed this exam :) .', 'alert-type' => 'success',);
                return redirect()->back()->with($notification);
            }
            $start_quiz->attempt = $start_quiz->attempt + 1;
            $start_quiz->update();
            return redirect()->route('quiz.step.two', $step);
        } else {
            $start_quiz = new InterviewUser();
            $start_quiz->student_id = Auth::user()->id;
            $start_quiz->name = Auth::user()->name;
            $start_quiz->email = Auth::user()->email;
            $start_quiz->course_id = $request->course_id;
            $start_quiz->attempt = 1;
            $start_quiz->save();
            return redirect()->route('quiz.step.two', $step);
        }
    }
    public function quiz_answer(Request $request)
    {
        $step = $request->step_id;
        // dd($step);
        $step = $step;
        $question = QuizQuestion::find($request->quiz_question_id);
        $course_id = $question->course_id;
        $interview_user = InterviewUser::where('student_id', Auth::user()->id)->where('course_id', $course_id)->first();
        $interview_attempt = $interview_user->attempt;

        $ans = UserQuizAnswer::where('interview_user_id', Auth::user()->id)
            ->where('quiz_course_id', $course_id)
            ->where('quiz_question_id', $request->quiz_question_id)->first();
            if ($ans) {
                $question_ans = QuizAnswer::where('question_no', $request->quiz_question_id)->first();
                $ans->interview_user_id = Auth::user()->id;
                $ans->quiz_question_id = $request->quiz_question_id;
                $ans->quiz_course_id = $course_id;
                $ans->quiz_attempt = $interview_attempt;
                $ans->quiz_answer_id = $request->quiz_answer_id;
                // dd($interview_attempt);
                // dd($ans->quiz_answer_id, $request->quiz_answer_id, $question_ans->option_no);
                $ans->update();
            if ($question_ans->option_no == $request->quiz_answer_id) {
                $ans = new UserCorrectAns();
                $ans->interview_user_id = Auth::user()->id;
                $ans->quiz_question_id = $request->quiz_question_id;
                $ans->quiz_course_id = $course_id;
                $ans->quiz_attempt = $interview_attempt;
                $ans->quiz_answer_id = $request->quiz_answer_id;
                $ans->save();
            }
        } else {
            $question_ans = QuizAnswer::where('question_no', $request->quiz_question_id)->first();
            $ans = new UserQuizAnswer();
            $ans->interview_user_id = Auth::user()->id;
            $ans->quiz_question_id = $request->quiz_question_id;
            $ans->quiz_course_id = $course_id;
            $ans->quiz_attempt = $interview_attempt;
            $ans->quiz_answer_id = $request->quiz_answer_id;
            $ans->save();
            if ($question_ans->option_no == $request->quiz_answer_id) {
                $ans = new UserCorrectAns();
                $ans->interview_user_id = Auth::user()->id;
                $ans->quiz_question_id = $request->quiz_question_id;
                $ans->quiz_course_id = $course_id;
                $ans->quiz_attempt = $interview_attempt;
                $ans->quiz_answer_id = $request->quiz_answer_id;
                $ans->save();
            }
        }

        return redirect()->route('quiz.step.two', $step);
    }
    public function failPage()
    {
        return view('fail');
    }
    public function free_writing_ans(Request $request)
    {
        $ans = UserFreeWritingAns::where('interview_user_id', Auth::user()->id)->where('quiz_question_id', $request->quiz_question_id)->first();
        if ($ans) {
            $ans->interview_user_id = Auth::user()->id;
            $ans->quiz_question_id = $request->quiz_question_id;
            $ans->answer = $request->answer;
            $ans->update();
            Session::put('quiz_question_id', $ans->quiz_question_id);
        } else {
            $ans = new UserFreeWritingAns();
            $ans->interview_user_id = Auth::user()->id;
            $ans->quiz_question_id = $request->quiz_question_id;
            $ans->answer = $request->answer;
            $ans->save();
            Session::put('quiz_question_id', $ans->quiz_question_id);
        }

        return redirect()->route('quiz.step.four');
    }
    public function free_writing_skip(Request $request)
    {
        Session::put('quiz_question_id', $request->quiz_question_id);
        return redirect()->route('quiz.step.four');
    }
    public function quiz_answer_skip(Request $request)
    {
        Session::put('quiz_question_id', $request->quiz_question_id);
        return redirect()->route('quiz.step.two');
    }
    public function see_others_answer()
    {
        $quiz = QuizQuestion::where('status', 1)->where('question_type', 3)->get();
        return view('others_ans', compact('quiz'));
    }
}
