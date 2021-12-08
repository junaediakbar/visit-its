<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\KunjunganUserController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CustomAuthAdminController;
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

Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('/', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::get('admin-login', [CustomAuthController::class, 'admin'])->name('admin-login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::post('custom-admin-login', [CustomAuthController::class, 'customAdminLogin'])->name('admin-login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Route::get('admin/registration',  [CustomAuthAdminController::class, 'registration'])->name('register-admin');
Route::post('admin/custom-registration', [CustomAuthAdminController::class, 'customRegistration'])->name('register-admin.custom');
Route::get('admin/login', [CustomAuthAdminController::class, 'login'])->name('login-admin.custom');
Route::post('admin/check', [CustomAuthAdminController::class, 'check'])->name('check-admin.custom');
Route::get('admin/logout', [CustomAuthAdminController::class, 'logout'])->name('logout-admin.custom');


Route::group(['middleware'=>['AuthCheck']], function(){
    Route::name('admin.')->group(function () {
        Route::resource('admin/kunjungans', KunjunganController::class);
    });
});

Route::name('user.')->group(function () {
    Route::resource('user/kunjungans', KunjunganUserController::class);
});
Route::get('about', function(){
    return view('about');
});
