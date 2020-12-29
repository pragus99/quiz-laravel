<?php

use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, QuizController, UserController, QuestionController, ExamController};


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
/--- dibawah ini route untuk vue
Route::get('/{any}', function () {
    return view('layouts.vue');
})->where('any', '.*');
*/



Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/user/quiz/{quizId}', [ExamController::class, 'quizQuestions'])->middleware('auth');
Route::post('/quiz/create', [ExamController::class, 'postQuiz'])->middleware('auth');
Route::get('/result/user/{userId}/quiz/{quizId}', [ExamController::class, 'viewResult'])->middleware('auth');

Route::group(['middleware' => isAdmin::class], function () {
    Route::get('/', function () {
        return view('admin.admin');
    });
    Route::resource('quiz', QuizController::class);
    Route::resource('question', QuestionController::class);
    Route::resource('user', UserController::class);
    Route::get('exam/assign', [Examcontroller::class, 'create'])->name('exam.create');
    Route::post('exam/assign', [Examcontroller::class, 'assignExam'])->name('exam.assign');
    Route::get('exam/user', [Examcontroller::class, 'userExam'])->name('exam.index');
    Route::post('exam/remove', [Examcontroller::class, 'removeExam'])->name('exam.remove');
    // Route::get('/quiz/{id}/questions', QuizController::class, 'question')->name('quiz.question');
    Route::get('result', [ExamController::class, 'result'])->name('result');
    Route::get('result/{userId}/{quizId}', [ExamController::class, 'userQuizResult']);
});


