<?php

use App\Http\Controllers\admin\indexController;
use App\Models\YayinEvi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\yayinevi\indexController as yayinEviIndexController;
use App\Http\Controllers\admin\yazar\indexController as YazarIndexController;
use App\Http\Controllers\admin\kitap\indexController as KitapIndexController;
use App\Http\Controllers\admin\kategori\indexController as KategoriIndexController;
use App\Models\Yazarlar;

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

    Route::group(['namespace'=>'yazar','prefix'=>'yazar','as'=>'yazar.'],function(){
        Route::get('/',[YazarIndexController::class,'index'])->name('index');
        Route::get('/ekle',[YazarIndexController::class,'create'])->name('create');
        Route::post('/ekle',[YazarIndexController::class,'store'])->name('create.post');
        Route::get('/duzenle/{id}',[YazarIndexController::class,'edit'])->name('edit');
        Route::post('/duzenle/{id}',[YazarIndexController::class,'update'])->name('edit.post');
        Route::get('/sil{id}',[YazarIndexController::class,'delete'])->name('delete');
    });

    Route::group(['namespace'=>'kitap','prefix'=>'kitap','as'=>'kitap.'],function(){
        Route::get('/',[KitapIndexController::class,'index'])->name('index');
        Route::get('/ekle',[KitapIndexController::class,'create'])->name('create');
        Route::post('/ekle',[KitapIndexController::class,'store'])->name('create.post');
        Route::get('/duzenle/{id}',[KitapIndexController::class,'edit'])->name('edit');
        Route::post('/duzenle/{id}',[KitapIndexController::class,'update'])->name('edit.post');
        Route::get('/sil{id}',[KitapIndexController::class,'delete'])->name('delete');
    });

    Route::group(['namespace'=>'kategori','prefix'=>'kategori','as'=>'kategori.'],function(){
        Route::get('/',[KategoriIndexController::class,'index'])->name('index');
        Route::get('/ekle',[KategoriIndexController::class,'create'])->name('create');
        Route::post('/ekle',[KategoriIndexController::class,'store'])->name('create.post');
        Route::get('/duzenle/{id}',[KategoriIndexController::class,'edit'])->name('edit');
        Route::post('/duzenle/{id}',[KategoriIndexController::class,'update'])->name('edit.post');
        Route::get('/sil{id}',[KategoriIndexController::class,'delete'])->name('delete');
    });

    
});
