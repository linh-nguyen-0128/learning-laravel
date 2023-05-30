<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/login', function () {
    return view('login');
});

Route::get('/home', [UserController::class, 'index'])->name('user');
Route::get('/products/{id}', [UserController::class, 'show']);
Route::get('/posts/create', function () {
    return view('create');
})->name('post.create');

Route::get('/posts/{id}', [PostController::class, 'edit'])->name('post.edit');
