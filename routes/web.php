<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChallengeController;

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

Route::controller(PostController::Class)->group(function() {
    Route::get('/posts/create', 'create')->name('post.create');
    Route::post('/posts/store', 'store')->name('post.store');

    Route::get('/posts/{id}', 'show')->name('post.show');

    Route::get('/', 'index')->name('post.index');
    
    Route::get('/posts/{id}/edit', 'edit')->name('post.edit');
    Route::post('/posts/{id}/update', 'update')->name('post.update');

    Route::get('/like-post', 'likePost');
});

Route::controller(ChallengeController::Class)->group(function() {
    Route::get('/challenges/create', 'create')->name('challenge.create');
    Route::post('/challenges/store', 'store')->name('challenge.store');

    Route::get('/challenges/{id}', 'show')->name('challenge.show');

    // Route::get('/', 'index')->name('challenge.index');
    
    Route::get('/challenges/{id}/edit', 'edit')->name('challenge.edit');
    Route::post('/challenges/{id}/update', 'update')->name('challenge.update');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
