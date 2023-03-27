<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChallengeController;

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


Route::get('/challenge/create', function () {
    return view('admin.create-challenge');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(ChallengeController::Class)->group(function() {
    Route::get('/challenges/create', 'create')->name('challenge.create');
    Route::post('/challenges/store', 'store')->name('challenge.store');

    Route::get('/challenges/{id}', 'show')->name('challenge.show');

    Route::get('/', 'index')->name('challenge.index');
    
    Route::get('/challenges/{id}/edit', 'edit')->name('challenge.edit');
    Route::post('/challenges/{id}/update', 'update')->name('challenge.update');
});

Auth::routes();