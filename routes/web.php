<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\StudentController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('fornt');
route::get('step/one', 'IndexController@quizOne')->name('quiz.step.one');
route::get('step/option/{step}', 'IndexController@quizTwo')->name('quiz.step.two');
// route::get('step/three', 'IndexController@quizThree')->name('quiz.step.three');
// route::get('step/writing/question', 'IndexController@quizFour')->name('quiz.step.four');
// route::get('step/five', 'IndexController@quizFive')->name('quiz.step.five');
// route::get('step/six', 'IndexController@quizSix')->name('quiz.step.six');
// route::get('step/seven', 'IndexController@quizSeven')->name('quiz.step.seven');
// route::get('step/eight', 'IndexController@quizEight')->name('quiz.step.eight');
// route::get('step/nine', 'IndexController@quizNine')->name('quiz.step.nine');
// route::get('step/ten', 'IndexController@quizTen')->name('quiz.step.ten');
// route::get('step/eleven', 'IndexController@quizEleven')->name('quiz.step.eleven');
route::get('success', 'IndexController@SuccessPage')->name('view.success');
route::get('fail', 'IndexController@failPage')->name('view.fail');
route::post('free-writing-ans', 'IndexController@free_writing_ans')->name('free-writing-ans');
route::post('free-writing-skip', 'IndexController@free_writing_skip')->name('free-writing-skip');
route::get('see-others-answer', 'IndexController@see_others_answer')->name('see-others-answer');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('student.profile');
Route::post('/profile/update', 'HomeController@profileUpdate')->name('student.profile.update');
Route::post('/start-quiz', 'IndexController@start_quiz')->name('start-quiz');
Route::post('/start-quiz-answer', 'IndexController@quiz_answer')->name('start-quiz-answer');
Route::post('/start-quiz-skip', 'IndexController@quiz_answer_skip')->name('start-quiz-answer-skip');



// Admin Route
Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'AdminLoginPage'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'AdminLogin'])->name('login.admin');


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    // admin dashboard
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');
    // admin profile
    Route::get('/profile', [App\Http\Controllers\Admin\AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/profile/upate', [App\Http\Controllers\Admin\AdminController::class, 'AdminProfileUpdate'])->name('admin.update.profile');
    Route::post('/password/change', [App\Http\Controllers\Admin\AdminController::class, 'AdminPasswordChange'])->name('admin.password.change');

    //  quiz questions
    Route::get('/questions', [App\Http\Controllers\Admin\QuizQuestionController::class, 'index'])->name('question.index');
    Route::get('/questions/create', [App\Http\Controllers\Admin\QuizQuestionController::class, 'create'])->name('question.create');
    Route::post('/questions/store', [App\Http\Controllers\Admin\QuizQuestionController::class, 'store'])->name('question.store');
    Route::get('/questions/edit/{id}', [App\Http\Controllers\Admin\QuizQuestionController::class, 'edit'])->name('question.edit');
    Route::post('/questions/update/{id}', [App\Http\Controllers\Admin\QuizQuestionController::class, 'update'])->name('question.update');
    Route::get('/questions/delete/{id}', [App\Http\Controllers\Admin\QuizQuestionController::class, 'destroy'])->name('question.destroy');

    // Quiz Option
    Route::get('/quizOptions/create/{id}', [App\Http\Controllers\Admin\QuizOptionController::class, 'QuizOptionCreate'])->name('quizOptions.create');
    Route::post('/quizOptions/store/{id}', [App\Http\Controllers\Admin\QuizOptionController::class, 'QuizOptionStore'])->name('quizOptions.store');
    Route::get('/quizOptions/edit/{id}', [App\Http\Controllers\Admin\QuizOptionController::class, 'edit'])->name('quizOptions.edit');
    Route::post('/quizOptions/update/{id}', [App\Http\Controllers\Admin\QuizOptionController::class, 'update'])->name('quizOptions.update');
    Route::get('/quizOptions/delete/{id}', [App\Http\Controllers\Admin\QuizOptionController::class, 'destroy'])->name('quizOptions.destroy');

    // quiz answer
     Route::get('/quiz-answer', [App\Http\Controllers\Admin\QuizQuestionController::class, 'QuizAnsIndex'])->name('quiz_ans.index');
     Route::get('/quiz-answer/create', [App\Http\Controllers\Admin\QuizQuestionController::class, 'QuizAnsCreate'])->name('quiz_ans.create');
     Route::get('/quiz-answer/edit', [App\Http\Controllers\Admin\QuizQuestionController::class, 'QuizAnsEdit'])->name('quiz_ans.edit');

     // quiz option old
      Route::get('/quiz-option', [App\Http\Controllers\Admin\QuizQuestionController::class, 'QuizOptionIndex'])->name('quiz_option.index');

      Route::get('/quiz-option/create', [App\Http\Controllers\Admin\QuizQuestionController::class, 'QuizOptionCreate'])->name('quiz_option.create');
      Route::post('/quiz-option/store', [App\Http\Controllers\Admin\QuizQuestionController::class, 'QuizOptionStore'])->name('quiz_option.store');
      Route::get('/quiz-option/edit', [App\Http\Controllers\Admin\QuizQuestionController::class, 'QuizOptionEdit'])->name('quiz_option.edit');

    // user quiz
    Route::get('/quiz', [App\Http\Controllers\Admin\AdminController::class, 'QuizList'])->name('quiz.index');
    Route::get('/quiz/view/{id}', [App\Http\Controllers\Admin\AdminController::class, 'QuizView'])->name('quiz.view');
    Route::get('/user/delete/{id}', [App\Http\Controllers\Admin\AdminController::class, 'destroy'])->name('quiz.destroy');

    Route::get('courses', [CourseController::class, 'index'])->name('admin.course.index');
    Route::get('courses/create', [CourseController::class, 'create'])->name('admin.course.create');
    Route::post('courses/store', [CourseController::class, 'store'])->name('admin.course.store');
    Route::get('courses/edit/{id}', [CourseController::class, 'edit'])->name('admin.course.edit');
    Route::post('courses/update/{id}', [CourseController::class, 'update'])->name('admin.course.update');
    Route::get('courses/delete/{id}', [CourseController::class, 'delete'])->name('admin.course.delete');
    //student
    Route::get('students', [StudentController::class, 'index'])->name('admin.student.index');
    Route::get('students/create', [StudentController::class, 'create'])->name('admin.student.create');
    Route::post('students/store', [StudentController::class, 'store'])->name('admin.student.store');
    Route::get('students/edit/{id}', [StudentController::class, 'edit'])->name('admin.student.edit');
    Route::post('students/update/{id}', [StudentController::class, 'update'])->name('admin.student.update');
    Route::get('students/delete/{id}', [StudentController::class, 'destroy'])->name('admin.student.delete');
});
