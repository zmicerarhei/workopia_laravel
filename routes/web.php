<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('jobs', JobController::class)->names([
    'index' => 'jobs.index',
    'create' => 'jobs.create',
    'store' => 'jobs.store',
    'show' => 'jobs.show',
    'edit' => 'jobs.edit',
    'update' => 'jobs.update',
    'destroy' => 'jobs.destroy',
]);

Route::get('/register', [RegisterController::class, 'register'])->name('user.register');
Route::post('/register', [RegisterController::class, 'store'])->name('user.store');
Route::get('/login', [LoginController::class, 'login'])->name('user.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('user.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('user.logout');
