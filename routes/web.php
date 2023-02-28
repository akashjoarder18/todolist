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
use App\Http\Controllers\User\{AuthController,UserController};
Route::get('/', function () {
    return view('welcome');
});
// user login
Route::get('/user/login',[AuthController::class,'getLogin'])->name('getLogin');
Route::post('/user/login',[AuthController::class,'postLogin'])->name('postLogin');
// any user can register account to login
Route::get('/users/register',[UserController::class,'register'])->name('users.register');
Route::post('/users/store',[UserController::class,'store'])->name('users.store');
// after login user can access
Route::group(['middleware'=>['user_auth']],function(){
    // users profile
    Route::get('/user/logout',[UserController::class,'logout'])->name('logout');
    Route::get('/user/dashboard',[UserController::class,'dashboard'])->name('dashboard');
    Route::get('/user/users/{id}',[UserController::class,'index'])->name('users.index');
    Route::get('/user/users/edit/{id}',[UserController::class,'edit'])->name('users.edit');
    Route::post('/user/users/update/{id}',[UserController::class,'update'])->name('users.update');
});
