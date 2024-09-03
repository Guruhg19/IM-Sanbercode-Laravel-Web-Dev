<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index']);

Route::get('/register',[AuthController::class,'register'])->name('register');

Route::post('/welcome',[AuthController::class,'welcome'])->name('welcome');