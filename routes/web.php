<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\UserController;
Use App\Http\Controllers\BrandController;
Use App\Http\Controllers\SpecController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CompareController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//login
Route::get('/login',[UserController::class,'loginPage'])->name('loginPage');
Route::post('/login',[UserController::class,'attemptlogin'])->name('loginStore');
Route::post('/logout',[UserController::class,'logout'])->name('logout');

//register
Route::get('/register',[UserController::class,'create'])->name('register.create');
Route::post('/register',[UserController::class,'store'])->name('register.store');


//brand
Route::get('/brand',[BrandController::class,'index'])->name('brand.view');
// Route::get('/brand/create',[BrandController::class,'create'])->name('brand.create');
Route::post('/brand',[BrandController::class,'store'])->name('brand.store');
Route::delete('/brand/{id}',[BrandController::class,'destroy'])->name('brand.destroy');
Route::get('/brand/{id}/edit',[BrandController::class,'edit']);
Route::put('/brand/{id}',[BrandController::class,'update']);
Route::get('/brand/search', 'BrandController@search');


Route::get('/spec',[SpecController::class,'index'])->name('spec.view');
Route::get('/spec/create',[SpecController::class,'create'])->name('specCreate');
Route::post('/spec',[SpecController::class,'store'])->name('specStore');
Route::delete('/spec/{id}',[SpecController::class,'destroy']);
Route::get('/spec/{id}/edit',[SpecController::class,'edit']);
Route::put('/spec/{id}',[SpecController::class,'update']);


Route::
get('/',[UserController::class,'home'])->name('index.page');
// Route::get('/add-rating',)

Route::get('/search', [SearchController::class, 'search'])->name('search');


//Compare
Route::get('/compare',[CompareController::class, 'index']);
