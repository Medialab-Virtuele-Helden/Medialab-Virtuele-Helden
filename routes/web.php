<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/challenge/create', function () {
    return view('admin.create-challenge');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();