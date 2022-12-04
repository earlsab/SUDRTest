<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\MyPapersController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CategoriesController;




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

Auth::routes(['verify' => true]);

/* Home Page Route */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Super Admin Route Handles Adding Colleges, Paper Types and Users to Admins */
Route::prefix('SuperAdmin')->middleware(['auth','isAdmin'])->group(function() {
    Route::get('/Page', [SuperAdminController::class, 'index'])->name('SuperAdminPage');
    Route::get('/Roles/{id}', [SuperAdminController::class, 'roles'])->name('Roles');
    Route::resource('Changes', SuperAdminController::class)->only(['store','update']);
});

/* Admin Route Handles Everything in the CRUD except for adding */
Route::prefix('Admin')->middleware(['auth','isAdmin'])->group(function() {
    Route::get('/Page', [AdminController::class, 'index'])->name('AdminPage');
    Route::get('/Papers', [AdminController::class, 'showAll'])->name('MyPapersAdmin');
    Route::get('/PapersMaintain', [AdminController::class, 'maintenance'])->name('MyPapersMaintain');
    Route::get('/viewPDF/{id}', [AdminController::class, 'view'])->name('AdminView');
    Route::get('/compareRange', [AdminController::class, 'compareData'])->name('compareRange');
    Route::get('/Top3Keywords', [AdminController::class, 'filterKeywords'])->name('Top3Keywords');
    Route::resource('paper', AdminController::class)->only(['edit', 'update', 'destroy']);
});

/* Users Route Handles Adding and Viewing the Paper */
Route::prefix('User')->middleware(['auth'])->group(function(){
    Route::get('/MyProfile', [MyProfileController::class, 'index'])->name('MyProfile');
    Route::get('/Papers', [MyPapersController::class, 'index'])->name('Papers');
    Route::get('/Filter', [MyPapersController::class, 'filter'])->name('FilterResults');
    Route::get('/KeySearch', [MyPapersController::class, 'keysearch'])->name('KeySearch');
    Route::get('/KeywordSearch', [MyPapersController::class, 'keysearch'])->name('KeywordSearch');
    Route::get('/Category/PaperType', [CategoriesController::class, 'papertype'])->name('PaperType');
    Route::get('/Category/Colleges', [CategoriesController::class, 'college'])->name('Colleges');
    Route::get('/MyBookmarks', [BookmarkController::class, 'index'])->name('MyBookmarks');
    Route::get('/viewPDF/{id}', [MyPapersController::class, 'view'])->name('viewPDF');
    Route::get('/editPDF/{id}', [MyPapersController::class, 'editPDF'])->name('editPDF');
    Route::resource('papers', MyPapersController::class);
});

/* Profiles Route for Viewing and Changing Passwords */
Route::get('/ChangePass', [MyProfileController::class, 'changepass'])->name('ChangePass');
Route::post('/ChangePassword', [MyProfileController::class, 'updatepassword'])->name('passupdate');
Route::post('/Bookmarked', [BookmarkController::class, 'store'])->name('Bookmarks');







