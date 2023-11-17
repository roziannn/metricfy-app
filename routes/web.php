<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/login',[UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login',[UserController::class, 'authenticate']); 
Route::post('/logout',[UserController::class, 'logout']);

Route::get('/register',[RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register-store',[RegisterController::class, 'store']);

Route::get('/materi-belajar', [StudyController::class, 'index'])->name('materi');
Route::get('/materi-belajar/numerasi-dasar-matematika', [StudyController::class, 'show']);

Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard']);


