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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/login', [App\Http\Controllers\HomeController::class, 'adminlogin'])->name('AdminLogin');

Route::get('/MyProfile', [App\Http\Controllers\MyProfileController::class, 'index'])->name('MyProfile');

Route::get('/MyPapers', [App\Http\Controllers\MyPapersController::class, 'index'])->name('MyPapers');
Route::get('/UploadPaper', [App\Http\Controllers\MyPapersController::class, 'create'])->name('UploadPapers');

Route::get('/admin/login', [App\Http\Controllers\AdminController::class, 'login'])->name('AdminLogin');
Route::post('/admin/login', [App\Http\Controllers\AdminController::class, 'authenticate'])->name('AdminAuthenticate');
Route::get('/admin/home', [App\Http\Controllers\AdminController::class, 'index'])->name('AdminPage');
