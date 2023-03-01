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
use App\Http\Controllers\User\{AuthController,UserController,TodoController,TaskController};
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
    // Todo routes
    Route::get('/todo/todolists/{id}',[TodoController::class,'index'])->name('todolists.index');
    Route::get('/todolists/create',[TodoController::class,'create'])->name('todolists.create');
    Route::post('/todolists/store',[TodoController::class,'store'])->name('todolists.store');
    Route::get('/todo/todolists/edit/{id}',[TodoController::class,'edit'])->name('todolists.edit');
    Route::post('/todo/todolists/update/{id}',[TodoController::class,'update'])->name('todolists.update');
    Route::get('/todo/todolists/delete/{id}',[TodoController::class,'delete'])->name('todolists.delete');

    // tasks routes    
    Route::get('/task/tasklists/view/{id}',[TaskController::class,'view'])->name('tasklists.view');
    Route::get('/tasklists/create/{id}',[TaskController::class,'create'])->name('tasklists.create');
    Route::post('/tasklists/store',[TaskController::class,'store'])->name('tasklists.store');
    Route::get('/task/tasklists/edit/{id}',[TaskController::class,'edit'])->name('tasklists.edit');
    Route::post('/task/tasklists/update/{id}',[TaskController::class,'update'])->name('tasklists.update');
    Route::get('/task/tasklists/delete/{id}',[TaskController::class,'delete'])->name('tasklists.delete');
});
