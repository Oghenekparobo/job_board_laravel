<?php

use App\Http\Controllers\JobController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
   return  redirect('/jobs');
});

Route::resource('jobs', JobController::class)->only([
    'index',
    'show'
]);
