<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class,'Index'])->name('home.index');

// Users
Route::resource('/users',\App\Http\Controllers\UsersController::class);
Route::resource('/criteria',\App\Http\Controllers\CriteriaController::class);
Route::get('/criteria/option/{id}',[\App\Http\Controllers\CriteriaOptionController::class,'index'])->name('criteria.option');
Route::delete('/criteria/option/delete/{optid}',[\App\Http\Controllers\CriteriaOptionController::class,'destroy'])->name('criteria.option.delete');
Route::post('/criteria/option/store',[\App\Http\Controllers\CriteriaOptionController::class,'store'])->name('criteria.option.store');
Route::get('/criteria/option/{id}/edit',[\App\Http\Controllers\CriteriaOptionController::class,'edit'])->name('criteria.option.edit');