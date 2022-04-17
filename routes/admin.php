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


Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => '\App\Http\Controllers\Admin',
    'middleware' => []
], function () {


    Route::get('/', [\App\Http\Controllers\Admin\UsersController::class,'login'])->name('adminlogin');
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');

    // category
    Route::resource('category', CategoryController::class);
    Route::post('category/list', [\App\Http\Controllers\Admin\CategoryController::class,'datatable'])->name('category.datatable');
    Route::post('category/check', [\App\Http\Controllers\Admin\CategoryController::class,'checkunique'])->name('category.unique.check');







});


require __DIR__.'/auth.php';
