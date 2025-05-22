<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('/categories')->group(function () {
    Route::get('/',[CategoryController::class, 'index']);
    Route::get('/{id}',[CategoryController::class, 'show']);
});


Route::prefix('/articles')->group(function () {
    Route::post('/', [ArticleController::class, 'store']);
    Route::get('/', [ArticleController::class, 'index']);
    Route::get('/{id}', [ArticleController::class, 'show']);
    Route::post('/{id}', [ArticleController::class, 'update']);
    Route::delete('/{id}', [ArticleController::class, 'destroy']);
});