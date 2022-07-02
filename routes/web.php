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
Route::middleware('auth')->group(function(){
    Route::get('/', [\App\Http\Controllers\HomeController::class,'Index'])->name('home.index');
    
    // Users
    Route::resource('/users',\App\Http\Controllers\UsersController::class);
    Route::resource('/criteria',\App\Http\Controllers\CriteriaController::class);
    Route::get('/criteria/option/{id}',[\App\Http\Controllers\CriteriaOptionController::class,'index'])->name('criteria.option');
    Route::delete('/criteria/option/delete/{optid}',[\App\Http\Controllers\CriteriaOptionController::class,'destroy'])->name('criteria.option.delete');
    Route::post('/criteria/option/store',[\App\Http\Controllers\CriteriaOptionController::class,'store'])->name('criteria.option.store');
    Route::get('/criteria/option/{id}/edit',[\App\Http\Controllers\CriteriaOptionController::class,'edit'])->name('criteria.option.edit');
    // alternative
    Route::resource('/alternative',\App\Http\Controllers\AlternativeController::class);
    // auth
    Route::post('/logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('auth.logout'); 

    // penilaian
    Route::get('/penilaian',[\App\Http\Controllers\PenilaianController::class,'index'])->name('penilaian.index');
    Route::post('/penilaian/check',[\App\Http\Controllers\PenilaianController::class,'checkNik'])->name('penilaian.check');
    Route::post('/penilaian',[\App\Http\Controllers\PenilaianController::class,'insertPenilaian'])->name('penilaian.post');
    Route::get('/penilaian/survey',[\App\Http\Controllers\PenilaianController::class,'survey'])->name('penilaian.survey');
});
Route::middleware('guest')->group(function(){
    Route::get('/login',[\App\Http\Controllers\AuthController::class,'login'])->name('auth.login'); 
    Route::post('/login',[\App\Http\Controllers\AuthController::class,'authAction'])->name('auth.action'); 
});

