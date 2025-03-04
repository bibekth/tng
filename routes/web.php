<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\EsewaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);
Route::get('/signup', [App\Http\Controllers\HomeController::class, 'signup'])->name('signup');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('index');
Route::prefix('admin')->as('admin.')->middleware('auth')->group(function(){
    Route::get('/', function(){
        return redirect('/admin/main');
    });
    Route::resource('/main',MainController::class);
    Route::resource('users',UserController::class);
    Route::resource('events',EventController::class);
});
Route::post('events/pay', [EventController::class,'pay'])->name('event.pay');
Route::get('esewa/success',[EsewaController::class,'success'])->name('esewa.success');
Route::get('esewa/failure',[EsewaController::class,'failure'])->name('esewa.failure');
