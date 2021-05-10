<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'homepage'])->name('home');

// Authentication
Route::prefix('/auth')->name('auth.')->group(function() {
  Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
  Route::post('/login', [AuthController::class, 'login'])->name('login');
  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Posts
Route::prefix('/post')->name('post.')->group(function() {
  Route::post('/create', [PostController::class, 'create'])->name('create');
  Route::delete('/delete', [PostController::class, 'delete'])->name('delete');
  Route::get('/{id}', [PostController::class, 'show'])->name('show');
});