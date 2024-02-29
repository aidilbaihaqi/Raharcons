<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReqController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LoginController::class, 'index']); 

// Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']); 

// Form Request
Route::get('/formreq', [ReqController::class, 'create']);
Route::post('/formreq', [ReqController::class, 'store'])->name('formreq.store');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
 
// Admin
Route::middleware(['auth', 'level:2'])->group(function () {
    // Project - Admin
    Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/project/delete/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');
    Route::get('/project/show/{project}', [ProjectController::class, 'show'])->name('project.show');
    Route::get('/project/edit/{project}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::post('/project/update/{project}', [ProjectController::class, 'update'])->name('project.update');

    // User - Admin
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name(('user.destroy'));
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name(('user.edit'));
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name(('user.update'));

    // Request - Admin
    Route::get('/request/show', [ReqController::class, 'index'])->name('request.index');
    Route::get('/request/delete/{id}', [ReqController::class, 'destroy'])->name('request.destroy');
    Route::get('/request/show/{req}', [ReqController::class, 'show'])->name('request.show');
    Route::post('/request/approve/{req}', [ReqController::class, 'approveProject'])->name('request.approve');
});

// Mandor
Route::middleware(['auth', 'level:1'])->group(function () {
    // Project - Admin
    Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/project/show/{project}', [ProjectController::class, 'show'])->name('project.show');

    // Monitoring
    Route::get('/monitoring/create/{id}', [MonitoringController::class, 'create'])->name('monitoring.create');
    Route::post('/monitoring/create', [MonitoringController::class, 'store'])->name('monitoring.store');
});

// Client
Route::middleware(['auth', 'level:0'])->group(function () {
    // Project - Admin
    Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/project/show/{project}', [ProjectController::class, 'show'])->name('project.show');

    // Request
    Route::get('/request/show', [ReqController::class, 'index'])->name('request.index');
    Route::get('/request/show/{req}', [ReqController::class, 'show'])->name('request.show');
});


