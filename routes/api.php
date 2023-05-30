<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/login', [UserController::class, 'login'])->name('auth.login');

Route::prefix('/posts')->name('post.')->group(function () {
    Route::post('/', [PostController::class, 'store'])->name('store');
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/{id}', [PostController::class, 'show'])->where('id', '[0-9]+')->name('show');
    Route::delete('/{id}', [PostController::class, 'destroy'])->where('id', '[0-9]+')->name('destroy');
    Route::put('/{id}', [PostController::class, 'update'])->where('id', '[0-9]+')->name('update');
});
