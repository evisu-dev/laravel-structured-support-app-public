<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// 顧客管理
use App\Http\Controllers\Admin\Customer\CreateController as CustomerCreateController;
use App\Http\Controllers\Admin\Customer\StoreController as CustomerStoreController;
use App\Http\Controllers\Admin\Customer\IndexController as CustomerIndexController;
use App\Http\Controllers\Admin\Customer\EditController as CustomerEditController;
use App\Http\Controllers\Admin\Customer\UpdateController as CustomerUpdateController;
use App\Http\Controllers\Admin\Customer\DeleteController as CustomerDeleteController;
use App\Http\Controllers\Admin\Customer\ShowController as CustomerShowController;

// 対応受付（RECEPTION）
use App\Http\Controllers\Admin\Support\Reception\CreateController as ReceptionCreateController;
use App\Http\Controllers\Admin\Support\Reception\StoreController as ReceptionStoreController;

// 対応情報（Support）
use App\Http\Controllers\Admin\Support\IndexController as SupportIndexController;
use App\Http\Controllers\Admin\Support\ShowController as SupportShowController;
use App\Http\Controllers\Admin\Support\EditController as SupportEditController;
use App\Http\Controllers\Admin\Support\UpdateController as SupportUpdateController;
use App\Http\Controllers\Admin\Support\CompleteController as SupportCompleteController;

Route::get('/', fn() => redirect('/admin/support/reception/create'));

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | プロフィール管理
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | 顧客管理
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin/customer')->name('admin.customer.')->group(function () {
        Route::get('/create', CustomerCreateController::class)->name('create');
        Route::post('/store', CustomerStoreController::class)->name('store');
        Route::get('/index', CustomerIndexController::class)->name('index');
        Route::get('/{customer}', CustomerShowController::class)->name('show');
        Route::get('/{customer}/edit', CustomerEditController::class)->name('edit');
        Route::patch('/{customer}', CustomerUpdateController::class)->name('update');
        Route::delete('/{customer}', CustomerDeleteController::class)->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | 対応受付（RECEPTION）
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin/support/reception')->name('admin.support.reception.')->group(function () {
        Route::get('/create', ReceptionCreateController::class)->name('create');
        Route::post('/store', ReceptionStoreController::class)->name('store');
    });

    /*
    |--------------------------------------------------------------------------
    | 対応情報（Support）
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin/support')->name('admin.support.')->group(function () {
        Route::get('/index', SupportIndexController::class)->name('index');
        Route::get('/{support}', SupportShowController::class)->name('show');
        Route::get('/{support}/edit', SupportEditController::class)->name('edit');
        Route::patch('/{support}', SupportUpdateController::class)->name('update');
        Route::post('/{support}/complete', SupportCompleteController::class)->name('complete');
    });
});
