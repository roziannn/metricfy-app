<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use GuzzleHttp\Middleware;
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



Route::get('/',[HomeController::class, 'index']);

Route::get('/login',[UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login',[UserController::class, 'authenticate']); 
Route::post('/logout',[UserController::class, 'logout']);
Route::post('/edit-user{id}',[UserController::class, 'update']);
Route::get('/delete-user{id}', [UserController::class, 'delete']);

Route::get('/register',[RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register-store',[RegisterController::class, 'store']);

Route::get('/materi-belajar', [ModuleController::class, 'index'])->name('materi');
Route::get('/materi-belajar/numerasi-dasar-matematika', [ModuleController::class, 'show']);

Route::get('/main-dashboard-admin', [DashboardController::class, 'adminDashboard']);
Route::get('/dashboard-admin/data-user', [DashboardController::class, 'adminDashboardDataUser']);
Route::get('/dashboard-admin/data-module', [DashboardController::class, 'adminDashboardDataModule']);
Route::get('/dashboard-admin/module/create', [ModuleController::class, 'create']);


