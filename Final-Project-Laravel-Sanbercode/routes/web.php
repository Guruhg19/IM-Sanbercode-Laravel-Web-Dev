<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;

Route::get('/',[HomeController::class, 'index'])->name('/');

Route::get('/regis',[AuthController::class,'register'])->name('regis');

Route::post('/welcome',[AuthController::class,'welcome'])->name('welcome');

Route::get('/data-table', function(){
    return view('pages.data-tables');
})->name('data-table');

Route::get('/table', function(){
    return view('pages.table');
})->name('table');


Route::middleware(['auth'])->group(function () {
    Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/category',[CategoryController::class,'store'])->name('category.post');
    Route::get('/category',[CategoryController::class,'index'])->name('category');
    Route::get('/category/{id}',[CategoryController::class,'show']);
    Route::get('/category/{id}/edit',[CategoryController::class,'edit']);
    Route::put('/category/{id}',[CategoryController::class,'update']);
    Route::delete('/category/{id}',[CategoryController::class,'destroy']);
    Route::post('/borrow/{book_id}',[BorrowController::class,'store']);
});

// Route Books
Route::resource('/book',BookController::class);

Auth::routes();
