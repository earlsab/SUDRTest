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

/* My Profiles Route */ /* Handles the Profile View for the users */
Route::get('/MyProfile', [App\Http\Controllers\MyProfileController::class, 'index'])->name('MyProfile');
Route::get('/ChangePass', [App\Http\Controllers\MyProfileController::class, 'changepass'])->name('ChangePass');
Route::post('/ChangePassword', [App\Http\Controllers\MyProfileController::class, 'updatepassword'])->name('passupdate');

/* My Papers Route */ /* Handles the Add Papers on the user side */

    Route::get('/MyPapers', [App\Http\Controllers\MyPapersController::class, 'index'])->name('MyPapers');
    Route::get('/viewPDF/{is}', [App\Http\Controllers\MyPapersController::class, 'view'])->name('viewPDF');
    Route::resource('papers', MyPapersController::class);

/* My Papers Admin Route */ /* Handles the Edit, Delete and View of Papers on the admin side */
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function() {
    Route::get('/page', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.adminpage');
    Route::get('/Papers', [App\Http\Controllers\AdminController::class, 'showAll'])->name('MyPapersAdmin');
    Route::get('/PapersMaintain', [App\Http\Controllers\AdminController::class, 'maintenance'])->name('MyPapersMaintain');
    Route::get('/viewPDF/{is}', [App\Http\Controllers\AdminController::class, 'view'])->name('viewPDF');
});


/* Admin Login Route Not In Use
Route::get('/admin/login', [App\Http\Controllers\HomeController::class, 'adminlogin'])->name('AdminLogin');
Route::get('/admin/login', [App\Http\Controllers\AdminController::class, 'login'])->name('AdminLogin');
Route::post('/admin/login', [App\Http\Controllers\AdminController::class, 'authenticate'])->name('AdminAuthenticate');
*/
