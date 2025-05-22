<?php

use App\Http\Controllers\WebControllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/pages')->group(function () {
    Route::get('/home', [HomeController::class, "home"]);
    Route::get('/landing', [HomeController::class, 'landing']);
});