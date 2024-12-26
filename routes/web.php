<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MultimediaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin'], function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/addMultimedia', [MultimediaController::class, 'addMultimedia'])->name('add.Multimedia');
    Route::post('/storeMultimedia', [MultimediaController::class, 'store'])->name('store.multimedia');
    Route::get('/editMultimedia/{id}', [MultimediaController::class, 'editMultimedia'])->name('edit.multimedia');
    Route::put('/updateMultimedia/{id}', [MultimediaController::class, 'updateMultimedia'])->name('update.multimedia');
    Route::delete('/deleteMultimedia/{id}', [MultimediaController::class, 'deleteMultimedia'])->name('delete.multimedia');

    Route::get('/multimedia', [DataTableController::class, 'clientSide'])->name('multimedia');
    Route::get('/serverSide', [DataTableController::class, 'serverSide'])->name('serverSide');

    Route::get('/user', [UserController::class, 'user'])->name('user');
    Route::get('/addUser', [UserController::class, 'addUser'])->name('add.user');
    Route::post('/store', [UserController::class, 'store'])->name('store.user');
    Route::get('/editUser/{id}', [UserController::class, 'editUser'])->name('edit.user');
    Route::put('/updateUser/{id}', [UserController::class, 'updateUser'])->name('update.user');
    Route::delete('/deleteUser/{id}', [UserController::class, 'deleteUser'])->name('delete.user');


});
