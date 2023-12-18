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
use App\Models\BanksoalQuestion;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });



Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('/login',[UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login',[UserController::class, 'authenticate']); 
Route::post('/logout',[UserController::class, 'logout']);
Route::post('/edit-user{id}',[UserController::class, 'update']);
Route::get('/delete-user{id}', [UserController::class, 'delete']);

Route::get('/register',[RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register-store',[RegisterController::class, 'store']);

Route::get('/materi-belajar', [ModuleController::class, 'index'])->name('materi');
Route::get('/materi-belajar/{slug}', [ModuleController::class, 'showUser'])->name('user.module.show');

Route::get('/main-dashboard-admin', [DashboardController::class, 'adminDashboard']);
Route::get('/dashboard-admin/data-user', [DashboardController::class, 'adminDashboardDataUser']);
Route::get('/dashboard-admin/data-module', [DashboardController::class, 'adminDashboardDataModule']);
Route::get('/dashboard-admin/module/create', [ModuleController::class, 'create']);
Route::post('/dashboard-admin/module/store', [ModuleController::class, 'store']);
Route::post('/dashboard-admin/module/{id}/update', [ModuleController::class, 'update']);

// Slug modul
Route::get('/module/{slug}', 'ModuleController@show'); // Contoh route untuk modul
Route::get('/submodule/{slug}', 'SubmoduleController@show'); // Contoh route untuk submodul

//module ADMIN
Route::get('/dashboard-admin/data-module/{slug}', [ModuleController::class, 'showAdmin'])->name('admin.dashboard-admin.show');
Route::get('/dashboard-admin/data-module/{slug}/create-sub-module', [ModuleController::class, 'createSubModule']);
Route::post('/dashboard-admin/data-module/{id}/store-sub-module', [ModuleController::class, 'storeSubModule']);
Route::get('/dashboard-admin/data-module/{moduleSlug}/{submoduleSlug}/edit', [ModuleController::class,'editSubModule']); 
Route::post('/dashboard-admin/data-module/{slug}/update', [ModuleController::class,'updateSubModule']); 

//blog ADMIN
Route::get('/dashboard-admin/data-blog', [DashboardController::class, 'adminDashboardDataBlog'])->name('admin-blog');
Route::get('/dashboard-admin/blog/create', [BlogController::class, 'create']);
Route::post('/dashboard-admin/blog/store', [BlogController::class, 'store']);
Route::post('/dashboard-admin/blog/{slug}/update', [BlogController::class, 'update']);
Route::get('/dashboard-admin/blog/{slug}', [BlogController::class, 'showAdmin']);

//blog USER
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'showUser'])->name('user-blog');


//subModule User view
Route::get('/materi-belajar/{moduleSlug}/{submoduleSlug}', [ModuleController::class,'subModuleShowUser']); //slug 1 untuk module, slug 2 untuk submodulenya

//ExerciseModule by Admin
Route::get('/dashboard-admin/data-module/{slug}/create-exercise', [ExerciseController::class, 'create'])->name('admin.dashboard-admin.dataModule.exerciseModule');
Route::post('/dashboard-admin/data-module/{id}/store-exercise', [ExerciseController::class, 'store']);
Route::get('/dashboard-admin/data-module/{id}/delete-exercise', [ExerciseController::class, 'delete']);

//ExerciseModule by User
Route::get('/{slug}/latihan-soal', [ExerciseController::class, 'show']);
Route::post('/{slug}/latihan-soal/{exerciseId}/submit', [ExerciseController::class,'submitAnswer'])->name('submitAnswer');//Cek jawaban exercise

//Dashboard user
Route::get('/profile', [UserDashboardController::class, 'profile']); //profile
Route::post('/profile/update', [UserDashboardController::class, 'profileUpdate']); //profile

//Pojok-literasi - Page (user)
Route::get('/wikimedia/search',[PojokLiterasiController::class, 'wikiSearch'])->name('wikimedia-search');
Route::get('/wikimedia',[PojokLiterasiController::class, 'wikiIndex']);
Route::get('/kamus/search',[PojokLiterasiController::class, 'kamusSearch'])->name('kamus-search');
Route::get('/kamus',[PojokLiterasiController::class, 'kamusIndex']);

//Banksoal - ADMIN
Route::get('/dashboard-admin/data-banksoal', [DashboardController::class, 'adminDashboardDataBanksoal'])->name('admin-banksoal');
Route::get('/dashboard-admin/banksoal/create', [BanksoalController::class, 'create']);
Route::post('/dashboard-admin/banksoal/store', [BanksoalController::class, 'store']);
Route::get('/dashboard-admin/banksoal/{slug}', [BanksoalController::class, 'showAdmin']);

//BanksoalQuestion - ADMIN
Route::get('/dashboard-admin/banksoal/{slug}/create', [BanksoalQuestionController::class, 'create']);
Route::post('/dashboard-admin/banksoal/{slug}/store', [BanksoalQuestionController::class, 'store']);
Route::get('/dashboard-admin/banksoal/{id}/delete', [BanksoalQuestionController::class, 'delete']);

//Banksoal - USER
Route::get('/banksoal', [BanksoalController::class, 'index'])->name('banksoal');
Route::get('/banksoal/{slug}', [BanksoalController::class, 'showUser']);
Route::get('/banksoal/{slug}/exercise', [BanksoalController::class, 'exercise']);


