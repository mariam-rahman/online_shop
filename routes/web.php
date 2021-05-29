<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainpageController;
//use App\Http\Controllers\MainpageConroller;

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
    return view('index');
})->name('index');

Route::view('about-us','about')->name('about');

Route::get('test/{id?}',[TestController::class,'test']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('maincontent',[MainpageController::class, 'mainpage'])->name('main');

//Route::view('main','mainpage')->name('main');

Route::get('myshop', [ShopController::class, 'shop'])->name('shop');
 Route::get('contact-us',[ContactController::class, 'contact'])->name('contact');

Route::resource('slider',SliderController::class);

Route::get('/category',[CategoryController::class,'index']);
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
Route::put('/category/{id}',[CategoryController::class,'update'])->name('category.update');
Route::delete('/category/{id}',[CategoryController::class,'destroy'])->name('category.destroy');