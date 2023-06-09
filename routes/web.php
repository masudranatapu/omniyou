<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SurveyController;
use App\Http\Controllers\Admin\WorkerController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\QuizOptionController;
use App\Http\Controllers\Admin\QuizQuestionController;
use App\Http\Middleware\Admin;

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
// home
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('student.profile');
Route::post('/profile/update', 'HomeController@profileUpdate')->name('student.profile.update');
Route::post('/start-quiz', 'IndexController@start_quiz')->name('start-quiz');
Route::post('/start-quiz-answer', 'IndexController@quiz_answer')->name('start-quiz-answer');
Route::post('/start-quiz-skip', 'IndexController@quiz_answer_skip')->name('start-quiz-answer-skip');
// auth
Auth::routes();

// Admin Route
Route::get('/admin/login', [LoginController::class, 'AdminLoginPage'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'AdminLogin'])->name('login.admin');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    // admin dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // admin profile
    Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/profile/upate', [AdminController::class, 'AdminProfileUpdate'])->name('admin.update.profile');
    Route::post('/password/change', [AdminController::class, 'AdminPasswordChange'])->name('admin.password.change');
    Route::get('/web-setting', [SettingController::class, 'webSetting'])->name('admin.web.setting');
    Route::post('/web-setting-update', [SettingController::class, 'webUpdate'])->name('admin.web.setting.update');
    //  quiz questions
    Route::get('/questions', [QuizQuestionController::class, 'index'])->name('question.index');
    Route::get('/questions/create', [QuizQuestionController::class, 'create'])->name('question.create');
    Route::post('/questions/store', [QuizQuestionController::class, 'store'])->name('question.store');
    Route::get('/questions/edit/{id}', [QuizQuestionController::class, 'edit'])->name('question.edit');
    Route::post('/questions/update/{id}', [QuizQuestionController::class, 'update'])->name('question.update');
    Route::get('/questions/delete/{id}', [QuizQuestionController::class, 'destroy'])->name('question.destroy');
    // Quiz Option
    Route::get('/quizOptions/create/{id}', [QuizOptionController::class, 'QuizOptionCreate'])->name('quizOptions.create');
    Route::post('/quizOptions/store/{id}', [QuizOptionController::class, 'QuizOptionStore'])->name('quizOptions.store');
    Route::get('/quizOptions/edit/{id}', [QuizOptionController::class, 'edit'])->name('quizOptions.edit');
    Route::post('/quizOptions/update/{id}', [QuizOptionController::class, 'update'])->name('quizOptions.update');
    Route::get('/quizOptions/delete/{id}', [QuizOptionController::class, 'destroy'])->name('quizOptions.destroy');
    // quiz answer
    Route::get('/quiz-answer', [QuizQuestionController::class, 'QuizAnsIndex'])->name('quiz_ans.index');
    Route::get('/quiz-answer/create', [QuizQuestionController::class, 'QuizAnsCreate'])->name('quiz_ans.create');
    Route::get('/quiz-answer/edit', [QuizQuestionController::class, 'QuizAnsEdit'])->name('quiz_ans.edit');
    // quiz option old
    Route::get('/quiz-option', [QuizQuestionController::class, 'QuizOptionIndex'])->name('quiz_option.index');
    Route::get('/quiz-option/create', [QuizQuestionController::class, 'QuizOptionCreate'])->name('quiz_option.create');
    Route::post('/quiz-option/store', [QuizQuestionController::class, 'QuizOptionStore'])->name('quiz_option.store');
    Route::get('/quiz-option/edit', [QuizQuestionController::class, 'QuizOptionEdit'])->name('quiz_option.edit');
    // user quiz
    Route::get('/quiz', [AdminController::class, 'QuizList'])->name('quiz.index');
    Route::get('/quiz/view/{id}', [AdminController::class, 'QuizView'])->name('quiz.view');
    Route::get('/user/delete/{id}', [AdminController::class, 'destroy'])->name('quiz.destroy');
    Route::get('clients', [ClientController::class, 'index'])->name('admin.client.index');
    Route::get('clients/create', [ClientController::class, 'create'])->name('admin.client.create');
    Route::post('clients/store', [ClientController::class, 'store'])->name('admin.client.store');
    Route::get('clients/edit/{id}', [ClientController::class, 'edit'])->name('admin.client.edit');
    Route::post('clients/update/{id}', [ClientController::class, 'update'])->name('admin.client.update');
    Route::get('clients/delete/{id}', [ClientController::class, 'delete'])->name('admin.client.delete');
    //worker
    Route::get('workers', [WorkerController::class, 'index'])->name('admin.worker.index');
    Route::get('workers/create', [WorkerController::class, 'create'])->name('admin.worker.create');
    Route::post('workers/store', [WorkerController::class, 'store'])->name('admin.worker.store');
    Route::get('workers/show/{id}', [WorkerController::class, 'show'])->name('admin.worker.show');
    Route::get('workers/edit/{id}', [WorkerController::class, 'edit'])->name('admin.worker.edit');
    Route::post('workers/update/{id}', [WorkerController::class, 'update'])->name('admin.worker.update');
    Route::get('workers/delete/{id}', [WorkerController::class, 'destroy'])->name('admin.worker.delete');
    Route::get('workers/survey/{wid}/{sid}', [WorkerController::class, 'surveyUser'])->name('admin.serveyuser');
    Route::post('workers/survey-assigned-client', [WorkerController::class, 'assignedClient'])->name('admin.worker.assignedclient');
    // survey
    Route::get('survey', [SurveyController::class, 'index'])->name('admin.survey.index');
    Route::get('survey/create', [SurveyController::class, 'create'])->name('admin.survey.create');
    Route::post('survey/store', [SurveyController::class, 'store'])->name('admin.survey.store');
    Route::get('survey/show/{id}', [SurveyController::class, 'show'])->name('admin.survey.show');
    Route::get('survey/edit/{id}', [SurveyController::class, 'edit'])->name('admin.survey.edit');
    Route::post('survey/update/{id}', [SurveyController::class, 'update'])->name('admin.survey.update');
    Route::get('survey/delete/{id}', [SurveyController::class, 'destroy'])->name('admin.survey.delete');
});
