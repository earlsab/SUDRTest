<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPapersController;

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


/* Home Page Route */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* My Profiles Route */
Route::get('/MyProfile', [App\Http\Controllers\MyProfileController::class, 'index'])->name('MyProfile');
Route::get('/ChangePass', [App\Http\Controllers\MyProfileController::class, 'changepass'])->name('ChangePass');

/* My Papers Route */
Route::get('/MyPapers', [App\Http\Controllers\MyPapersController::class, 'index'])->name('MyPapers');
Route::get('/viewPDF/{is}', [App\Http\Controllers\MyPapersController::class, 'view'])->name('viewPDF');

/* My Papers Admin Route */
Route::get('Admin/MyPapers', [App\Http\Controllers\MyPapersController::class, 'indexAdmin'])->name('MyPapersAdmin');
Route::get('Admin/MyPapersMaintain', [App\Http\Controllers\MyPapersController::class, 'maintainshow'])->name('MyPapersMaintain');
Route::resource('papers', MyPapersController::class);


/* Admin Login Route */
Route::get('/admin/login', [App\Http\Controllers\HomeController::class, 'adminlogin'])->name('AdminLogin');
Route::get('/admin/login', [App\Http\Controllers\AdminController::class, 'login'])->name('AdminLogin');
Route::post('/admin/login', [App\Http\Controllers\AdminController::class, 'authenticate'])->name('AdminAuthenticate');
Route::get('Admin/home', [App\Http\Controllers\AdminController::class, 'index'])->name('AdminPage');
