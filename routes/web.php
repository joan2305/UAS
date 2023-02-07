<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
   Route::get('/', [HomeController::class, 'index'])->name('home');
   Route::post('/auth/register', [UserController::class, 'register'])->name('register');
   Route::post('/auth/login', [UserController::class, 'login'])->name('login');
   Route::get('/auth/register', [HomeController::class, 'registerIndex'])->name('registerIndex');
   Route::get('/auth/login', [HomeController::class, 'loginIndex'])->name('loginIndex');
   Route::group(['middleware'=> 'RoleAuthorized'], function(){
      Route::get('/product/{id}', [ProductController::class, 'detail'])->name('toDetailProduct');
      Route::post('/cart/{id}', [CartController::class, 'store'])->name('storeCart');
      Route::get('/cart', [CartController::class, 'index'])->name('toCartIndex');
      Route::post('/checkout/{id}', [TransactionController::class, 'checkOut'])->name('checkoutCart');
      Route::post('/auth/logout', [UserController::class, 'logout'])->name('logout');
      Route::get('/profile', [UserController::class, 'profileIndex'])->name('profileIndex');
      Route::put('/profile/{id}', [UserController::class, 'edit'])->name('updateProfile');
      Route::post('/search', [HomeController::class, 'search'])->name('searchProduct');
   });   
   Route::group(['middleware'=> 'RoleAdmin'], function(){
      Route::get('/accountMaintenance', [HomeController::class, 'maintenanceIndex'])->name('toMaintenanceIndex');
      Route::get('/updateAccount/{id}', [HomeController::class, 'updateAccIndex'])->name('toUpdateRole');
      Route::put('/updateRole/{id}', [UserController::class, 'updateRole'])->name('updateRole');
   });
});

   