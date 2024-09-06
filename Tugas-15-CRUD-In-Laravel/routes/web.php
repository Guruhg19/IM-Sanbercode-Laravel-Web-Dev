<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;

Route::get('/',[HomeController::class,'index'])->name('/');

Route::get('/register',[AuthController::class,'register'])->name('register');

Route::post('/welcome',[AuthController::class,'welcome'])->name('welcome');

Route::get('/data-table', function(){
    return view('pages.data-tables');
})->name('data-table');

Route::get('/table', function(){
    return view('pages.table');
})->name('table');

Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');

Route::post('/category',[CategoryController::class,'store'])->name('category.post');

Route::get('/category',[CategoryController::class,'index'])->name('category');

Route::get('/category/{id}',[CategoryController::class,'show']);

Route::get('/category/{id}/edit',[CategoryController::class,'edit']);

Route::put('/category/{id}',[CategoryController::class,'update']);

Route::delete('/category/{id}',[CategoryController::class,'destroy']);