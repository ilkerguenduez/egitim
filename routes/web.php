<?php

use App\Http\Controllers\admin\indexController;
use App\Models\YayinEvi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\yayinevi\indexController as yayinEviIndexController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace'=>'admin','prefix'=>'admin','as'=>'admin.'],function(){
    Route::get('/',[indexController::class,'index'])->name('index');


    Route::group(['namespace'=>'yayinevi','prefix'=>'yayinevi','as'=>'yayinevi.'],function(){
        Route::get('/',[yayinEviIndexController::class,'index'])->name('index');
        Route::get('/ekle',[yayinEviIndexController::class,'create'])->name('create');
        Route::post('/ekle',[yayinEviIndexController::class,'store'])->name('create.post');
        Route::get('/duzenle/{id}',[yayinEviIndexController::class,'edit'])->name('edit');
        Route::post('/duzenle/{id}',[yayinEviIndexController::class,'update'])->name('edit.post');
        Route::get('/sil{id}',[yayinEviIndexController::class,'delete'])->name('delete');
    });
});
