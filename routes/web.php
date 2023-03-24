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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(PostController::Class)->group(function() {
    Route::get('/posts/create', 'create');
    Route::post('/posts/store', 'store');

    Route::get('/posts/{id}', 'show');
    
    Route::get('/posts/{id}/edit', 'edit');
    Route::post('/posts/{id}/update', 'update');

    Route::get('/like-post', 'likePost');
});


Route::get('/challenge/create', function () {
    return view('admin.create-challenge');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();