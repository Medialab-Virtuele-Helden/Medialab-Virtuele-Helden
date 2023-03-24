<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome-test');
});

//Route for the page to create a new challenge
Route::get('/challenge/create', function () {
    return view('admin.create-challenge');
});

//Route for the page to show a challenge
Route::get('/challenge/show', function () {
    return view('admin.show-challenge');
});
