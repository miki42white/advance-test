<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('index');
});

Route::post('/confirm', [ContactController::class, 'confirm']);

Route::get('/thanks', [ContactController::class, 'thanks']);

Route::post('/thanks', [ContactController::class, 'complete']);

Route::get('/search',[ContactController::class, 'search']);

Route::post('/search',[ContactController::class, 'find']);

Route::post('/search/delete',[ContactController::class, 'destroy']);


