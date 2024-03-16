<?php

use App\Models\Blog;
use App\Models\Module;
use App\Models\Exercise;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboard;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\BanksoalController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PojokLiterasiController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\BanksoalQuestionController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\PojokNumerasiController;
use App\Models\Banksoal;
use App\Models\BanksoalQuestion;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;



// Any Roles [Guest, User, Admin]
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/register-store', [RegisterController::class, 'store']);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/materi-belajar', [ModuleController::class, 'index'])->name('materi');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'showUser'])->name('user-blog');

Route::get('/banksoal', [BanksoalController::class, 'index'])->name('banksoal');

Route::get('/games', [GamesController::class, 'showAll'])->name('daily-games');
Route::get('/games/guess-the-number', [GamesController::class, 'gameGuessTheNumber'])->name('game-1');

Route::get('/introduction-numerasi', [PojokNumerasiController::class, 'infografisNumerasi'])->name('infografis');




// ADMIN ROLES //
Route::middleware(['auth', 'roles'])->group(function () {
    Route::get('/dashboard-admin', [DashboardController::class, 'adminDashboard'])->name('dashboard.admin');

    //Admin - User
    Route::get('/dashboard-admin/data-user', [DashboardController::class, 'adminDashboardDataUser']);
    Route::post('/dashboard-admin/data-user/store', [UserController::class, 'storeUserByAdmin']);
    Route::post('/edit-user{id}', [UserController::class, 'update']);
    Route::get('/delete-user{id}', [UserController::class, 'delete']);

    //Admin - Module
    Route::get('/dashboard-admin/data-module', [DashboardController::class, 'adminDashboardDataModule']);
    Route::get('/dashboard-admin/module/create', [ModuleController::class, 'create']);
    Route::post('/dashboard-admin/module/store', [ModuleController::class, 'store']);
    Route::post('/dashboard-admin/module/{id}/update', [ModuleController::class, 'update']);
    Route::post('/dashboard-admin/module/{slug}/delete', [ModuleController::class, 'delete']);

    Route::get('/dashboard-admin/data-module/{slug}', [ModuleController::class, 'showAdmin'])->name('admin.dashboard-admin.show');
    Route::get('/dashboard-admin/data-module/{slug}/create-sub-module', [ModuleController::class, 'createSubModule']);
    Route::post('/dashboard-admin/data-module/{id}/store-sub-module', [ModuleController::class, 'storeSubModule']);
    Route::get('/dashboard-admin/data-module/{moduleSlug}/{submoduleSlug}/edit', [ModuleController::class, 'editSubModule']);
    Route::post('/dashboard-admin/data-module/{slug}/update', [ModuleController::class, 'updateSubModule']);
    Route::post('/dashboard-admin/data-module/{moduleSlug}/{submoduleSlug}/delete', [ModuleController::class, 'deleteSubModule']);

    //Admin - Blog
    Route::get('/dashboard-admin/data-blog', [DashboardController::class, 'adminDashboardDataBlog'])->name('admin-blog');
    Route::get('/dashboard-admin/blog/create', [BlogController::class, 'create']);
    Route::post('/dashboard-admin/blog/store', [BlogController::class, 'store']);
    Route::post('/dashboard-admin/blog/{slug}/update', [BlogController::class, 'update']);
    Route::post('/dashboard-admin/blog/{slug}/delete', [BlogController::class, 'delete']);
    Route::get('/dashboard-admin/blog/{slug}', [BlogController::class, 'showAdmin']);

    //Admin - ExerciseModule
    Route::get('/dashboard-admin/data-module/{slug}/create-exercise', [ExerciseController::class, 'create'])->name('admin.dashboard-admin.dataModule.exerciseModule');
    Route::post('/dashboard-admin/data-module/{id}/store-exercise', [ExerciseController::class, 'store']);
    Route::post('/dashboard-admin/data-module/{moduleSlug}/exercise/{exerciseId}/update', [ExerciseController::class, 'update']);
    Route::post('/dashboard-admin/data-module/{moduleSlug}/exercise/{exerciseId}/delete', [ExerciseController::class, 'delete']);

    //Admin - Bank soal
    Route::get('/dashboard-admin/data-banksoal', [DashboardController::class, 'adminDashboardDataBanksoal'])->name('admin-banksoal');
    Route::get('/dashboard-admin/banksoal/create', [BanksoalController::class, 'create']);
    Route::post('/dashboard-admin/banksoal/store', [BanksoalController::class, 'store']);
    Route::post('/dashboard-admin/banksoal/{slug}/update', [BanksoalController::class, 'update']);
    Route::get('/dashboard-admin/banksoal/{slug}', [BanksoalController::class, 'showAdmin']);
    Route::post('/dashboard-admin/banksoal/{slug}/delete', [BanksoalController::class, 'delete']);

    //Admin - Bank soal Question
    Route::get('/dashboard-admin/banksoal/{slug}/create', [BanksoalQuestionController::class, 'create']);
    Route::post('/dashboard-admin/banksoal/{slug}/store', [BanksoalQuestionController::class, 'store']);
    Route::post('/dashboard-admin/banksoal/{id}/update', [BanksoalQuestionController::class, 'update']);
    Route::get('/dashboard-admin/banksoal/{id}/delete', [BanksoalQuestionController::class, 'delete']);
});


// USER OR LOGIN ONLY //
Route::middleware(['auth'])->group(function () {
    //User - Materi Belajar>Materi
    Route::get('/materi-belajar/{slug}', [ModuleController::class, 'showUser'])->name('user.module.show');
    Route::get('/materi-belajar/{moduleSlug}/{submoduleSlug}', [ModuleController::class, 'subModuleShowUser']); //slug 1 untuk module, slug 2 untuk submodulenya

    //User - ExerciseModule
    Route::get('/{slug}/latihan-soal', [ExerciseController::class, 'show']);
    Route::post('/{slug}/latihan-soal/{exerciseId}/submit', [ExerciseController::class, 'submitAnswer'])->name('submitAnswer');

    //user - Profile Account
    Route::get('/profile', [UserDashboardController::class, 'profile']); //profile
    Route::post('/profile/update', [UserDashboardController::class, 'profileUpdate']); //profile
    Route::post('/profile/password/update', [UserDashboardController::class, 'profilePasswordUpdate']); //profile

    //User - Bank soal
    Route::get('/banksoal/{slug}', [BanksoalController::class, 'showUser'])->name('user.banksoal.show');
    Route::get('/banksoal/{slug}/exercise', [BanksoalController::class, 'exercise']);
    Route::post('/submit-exam-banksoal/{id}', [BanksoalController::class, 'submitExam']);
});
