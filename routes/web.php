<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
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
