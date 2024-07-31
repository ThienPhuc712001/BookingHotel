<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::resource('services', \App\Http\Controllers\ServiceController::class);
Route::resource('feedbacks', \App\Http\Controllers\FeedbackController::class);


