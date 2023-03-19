<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Webcontrol;
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
Route::group([ 'prefix' => 'admin'], function () {

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/do-login',[UserController::class,'doLogin'])->name('do.login');


Route::group(['middleware'=>'auth'],function (){

    Route::get('/logout',[UserController::class,'logout'])->name('logout');

    Route::get('/',[HomeController::class,'home'])->name('dashboard');
    Route::get('/users',[UserController::class,'list'])->name('user.list');
    Route::get('/create/user',[UserController::class,'create'])->name('user.create');
    Route::get('/categories',[CategoryController::class,'list'])->name('category.list');
    Route::get('/category/create',[CategoryController::class,'createForm'])->name('createform');
    Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('/brand/list',[BrandController::class,'list'])->name('brand.list');
    Route::get('/brand/create',[BrandController::class,'showForm'])->name('brand.show.form');
    Route::post('/brand/store',[BrandController::class,'store'])->name('brand.store');
    Route::get('/product/list',[ProductController::class,'list'])->name('product.list');
    Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
    Route::get('/patient/list',[CustomerController::class,'patient_list'])->name('patient.list');
    Route::get('/donar/list',[CustomerController::class,'donar_list'])->name('donar.list');

});
});


Route::get('/', [Webcontrol::class, 'webHome'])->name('home');
Route::post('/register/patient', [Webcontrol::class, 'registration_patient'])->name('patient.registration');
Route::post('/register/donar', [Webcontrol::class, 'registration_donar'])->name('donar.registration');
Route::post('/login', [Webcontrol::class, 'login'])->name('user.login');

Route::group(['middleware'=>'auth'],function (){
Route::get('/logout', [Webcontrol::class, 'logout'])->name('user.logout');

});
