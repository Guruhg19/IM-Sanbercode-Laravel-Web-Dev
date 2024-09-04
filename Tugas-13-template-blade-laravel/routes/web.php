<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/',[HomeController::class,'index'])->name('/');

Route::get('/register',[AuthController::class,'register'])->name('register');

Route::post('/welcome',[AuthController::class,'welcome'])->name('welcome');

Route::get('/data-table', function(){
    return view('pages.data-tables');
})->name('data-table');

Route::get('/table', function(){
    return view('pages.table');
})->name('table');