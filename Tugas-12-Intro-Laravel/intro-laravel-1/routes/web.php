<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/',[HomeController::class,'index']);

Route::get('/register',[AuthController::class,'register'])->name('register');

Route::post('/welcome',[AuthController::class,'welcome'])->name('welcome');


