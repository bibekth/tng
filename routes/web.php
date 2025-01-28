<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);
Route::get('/signup', [App\Http\Controllers\HomeController::class, 'signup'])->name('signup');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('index');
Route::prefix('admin')->as('admin.')->middleware('auth')->group(function(){
    Route::resource('/main',MainController::class);
    Route::resource('users',UserController::class);
    Route::resource('events',EventController::class);
});
