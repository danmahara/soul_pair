<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('website.home');
});
Route::get('home', function () {
    return view('website.home');

})->name('website.home');
Route::resource('users', UserController::class);


