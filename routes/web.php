<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
Route::post('/categories',[CategoryController::class,'save'])->name('categories.save');
Route::get('categories/{category}/edit',[CategoryController::class,'edit'])->name('categories.edit');
Route::put('categories/{category}',[CategoryController::class,'update'])->name('categories.update');
Route::delete('categories/{category}',[CategoryController::class,'delete'])->name('categories.delete');


