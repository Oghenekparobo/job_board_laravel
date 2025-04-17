<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MyJobApplicationController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return  redirect('/jobs');
});


Route::get('/login', [AuthController::class, 'create'])->name('login');

Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('/auth', AuthController::class)
    ->only(['create', 'store']);

Route::resource('jobs', JobController::class)
    ->only(['index', 'show']);

Route::get('job/{job}/application/create', [JobApplicationController::class, 'create'])
    ->name('job.application.create')
    ->middleware(['auth', 'can:apply,job']);

Route::post('job/{job}/application', [JobApplicationController::class, 'store'])
    ->name('job.application.store')->middleware('auth');

Route::resource('my-job-applications', MyJobApplicationController::class);

// Route::middleware('auth')->group(function () {
//     Route::resource('job.application', JobApplicationController::class)->only(['create', 'store']);
// });
