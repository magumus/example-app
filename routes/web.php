<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;

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

Route::get('/', [\App\Http\Controllers\Hesapla::class, 'index'])->name('stationary.index');


Route::post('/stationary/save', [\App\Http\Controllers\Hesapla::class, 'save'])->name('stationary.save');
Route::get('/stationary/delete/{id}', [\App\Http\Controllers\Hesapla::class, 'sil']);


//Route::get('ajax-request', [\App\Http\Controllers\AjaxController::class, 'create']);
Route::post('ajax-request', [\App\Http\Controllers\AjaxController::class, 'hesapet']);

Route::post('/ajax-kaydet', [\App\Http\Controllers\AjaxController::class, 'kaydet']);
Route::post('/ajax-sil', [\App\Http\Controllers\AjaxController::class, 'sil']);

Route::post('ajax-temizle', [\App\Http\Controllers\AjaxController::class, 'temizle']);


