<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\UserController;
Use App\Http\Controllers\BrandController;
Use App\Http\Controllers\SpecController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\AdminController;

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
Route::get('/',[UserController::class,'loginPage'])->name('loginPage');
Route::get('/home',[UserController::class,'home'])->name('index.page')->middleware('auth.user');
Route::post('/login',[UserController::class,'attemptlogin'])->name('loginStore');
Route::post('/logout',[UserController::class,'logout'])->name('logout');

//admin
Route::get('/admin',[AdminController::class,'admin'])->name('admin');
Route::post('/admin',[AdminController::class,'attemptLogin'])->name('admin.store');
Route::post('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');
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


Route::get('/spec',[SpecController::class,'index'])->name('spec.view')->middleware('auth.admin');
Route::get('/spec/create',[SpecController::class,'create'])->name('specCreate');
Route::post('/spec',[SpecController::class,'store'])->name('specStore');
Route::delete('/spec/{id}',[SpecController::class,'destroy']);
Route::get('/spec/{id}/edit',[SpecController::class,'edit']);
Route::put('/spec/{id}',[SpecController::class,'update']);

// Route::get('/add-rating',)

Route::get('/search', [SearchController::class, 'search'])->name('search');


//Compare
Route::get('/compare',[CompareController::class, 'index'])->name('compare.home');
Route::post('/addToCompare',[CompareController::class,'addToCompare'])->name('compare.add');
Route::post('/removeFromCompare',[CompareController::class,'removeFromCompare'])->name('compare.remove');
