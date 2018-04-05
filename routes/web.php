<?php

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('welcome');
});

Route::post('/login', 'UserController@login')->name('login');
Route::post('/register', 'UserController@store')->name('register');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'PostController@dashboard')->name('dashboard');
});