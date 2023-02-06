<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LanguageController;
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
Route::group(['middleware'=> 'Language'], function(){
   Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('switchLang');
   Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
   Route::group(['middleware'=> 'RoleAuthorized'], function(){
      Route::get('/product/{id}', [ProductController::class, 'detail'])->name('toDetailProduct');
      Route::post('/cart/{id}', [CartController::class, 'store'])->name('storeCart');
   });   
Auth::routes();
});

   