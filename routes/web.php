<?php

use App\Http\Controllers\Admin\BackupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserProfileController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('','App\Http\Controllers\Admin\DashboardController@index');
    Route::get('user-profile',[UserProfileController::class,'index'])->name('profile');
    Route::post('user-profile',[UserProfileController::class,'updateProfile'])->name('update-profile');
    Route::post('update-password',[UserProfileController::class,'updatePassword'])->name('update-password');

    Route::resource('categories', CategoryController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('purchases', PurchaseController::class);
    Route::resource('customers',CustomerController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

    Route::get('backup', [BackupController::class,'index'])->name('backup.index');
    Route::put('backup/create', [BackupController::class,'create'])->name('backup.store');
    Route::get('backup/download/{file_name?}', [BackupController::class,'download'])->name('backup.download');
    Route::delete('backup/delete/{file_name?}', [BackupController::class,'destroy'])->where('file_name', '(.*)')->name('backup.destroy');
});

