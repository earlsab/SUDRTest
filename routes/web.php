<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MyPapersController;
use App\Http\Controllers\MyProfileController;



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

/* Admin Route Handles Everything in the CRUD except for adding */
Route::prefix('Admin')->middleware(['auth','isAdmin'])->group(function() {
    Route::get('/Page', [App\Http\Controllers\AdminController::class, 'index'])->name('AdminPage');
    Route::get('/Papers', [App\Http\Controllers\AdminController::class, 'showAll'])->name('MyPapersAdmin');
    Route::get('/PapersMaintain', [App\Http\Controllers\AdminController::class, 'maintenance'])->name('MyPapersMaintain');
    Route::get('/viewPDF/{id}', [App\Http\Controllers\AdminController::class, 'view'])->name('AdminView');
    Route::resource('papers', AdminController::class)->only(['edit', 'update', 'destroy']);
});

/* Users Route Handles Adding and Viewing the Paper */
Route::prefix('User')->middleware(['auth'])->group(function(){
    Route::get('/MyProfile', [App\Http\Controllers\MyProfileController::class, 'index'])->name('MyProfile');
    Route::get('/Papers', [App\Http\Controllers\MyPapersController::class, 'index'])->name('Papers');
    Route::get('/Category/PaperType', [App\Http\Controllers\CategoriesController::class, 'index'])->name('PaperType');
    Route::get('/MyBookmarks', [App\Http\Controllers\BookmarkController::class, 'index'])->name('MyBookmarks');
    Route::get('/viewPDF/{id}', [App\Http\Controllers\MyPapersController::class, 'view'])->name('viewPDF');
    Route::resource('papers', MyPapersController::class)->only(['create','store']);
});

/* Profiles Route for Viewing and Changing Passwords */
Route::get('/ChangePass', [App\Http\Controllers\MyProfileController::class, 'changepass'])->name('ChangePass');
Route::post('/ChangePassword', [App\Http\Controllers\MyProfileController::class, 'updatepassword'])->name('passupdate');
Route::post('/Bookmarked', [App\Http\Controllers\BookmarkController::class, 'store'])->name('Bookmarks');

