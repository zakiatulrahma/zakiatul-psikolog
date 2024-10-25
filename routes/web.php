<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\QuestionController;

Route::get('/', [HomeController::class, 'landingPage'])->name('home');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/questionnaire/create', [QuestionnaireController::class, 'create'])->name('questionnaire.create');
    Route::post('/questionnaire/store', [QuestionnaireController::class, 'store'])->name('questionnaire.store');
    Route::post('/questionnaire/{id}/sendFeedback', [QuestionnaireController::class, 'sendFeedback'])->name('questionnaire.sendFeedback');
    Route::post('/questionnaire/{id}/submitRating', [QuestionnaireController::class, 'submitRating'])->name('questionnaire.submitRating');

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
        Route::get('/admin/comments', [CommentController::class, 'showAll'])->name('admin.allComment');
        Route::get('/admin/questionnaires/{questionnaire}', [AdminController::class, 'show'])->name('admin.questionnaires.show');
        Route::post('/admin/questionnaires/{questionnaire}/update', [AdminController::class, 'update'])->name('admin.questionnaires.update');
    });

    Route::middleware(['user'])->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('user.home');
        Route::get('/user/questionnaires/{questionnaire}', [UserController::class, 'show'])->name('user.questionnaires.show');
        Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    });
    
    Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::get('/user/questions', [QuestionController::class, 'showQuestions'])->name('questions.show');

    Route::get('/all-articles', [ArticleController::class, 'showAll'])->name('articles.all');
    Route::get('/questionnaires', [QuestionnaireController::class, 'showAll'])->name('user.questionnaires.showAll');
    Route::get('/notifications', [NotificationController::class, 'showAll'])->name('user.notification.showAll');
    
    Route::get('/dini', [QuestionController::class, 'showTopics'])->name('topics');
    Route::get('/questions/{topic}', [QuestionController::class, 'showQuestions'])->name('questions');
    Route::post('/questions/{topic}', [QuestionController::class, 'submitAnswer'])->name('submit.answer');
    Route::get('/result/{topic}', [QuestionController::class, 'showResult'])->name('result');
    Route::get('/solution/{topic}/{solutionId}', [QuestionController::class, 'showSolution'])->name('solution');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('articles', ArticleController::class);
});

Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('articles/{article}', [ArticleController::class, 'show'])->name('articles.show');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
