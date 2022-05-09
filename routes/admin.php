<?php

use App\Http\Controllers\Admin\UsersController;
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


     // category
     Route::resource('sub-category', SubCategoryController::class);
     Route::post('sub-category/list', [\App\Http\Controllers\Admin\SubCategoryController::class,'datatable'])->name('sub-category.datatable');
     Route::post('sub-category/check', [\App\Http\Controllers\Admin\SubCategoryController::class,'checkunique'])->name('subcategory.unique.check');
     Route::post('category/subcategory', [\App\Http\Controllers\Admin\SubCategoryController::class,'getsubcategory'])->name('category.subcategory');

     // User

     Route::get('user', [\App\Http\Controllers\Admin\UsersController::class,'index'])->name('admin.user.index');

    //Product
    Route::resource('product', ProductController::class);
    Route::post('product/list', [\App\Http\Controllers\Admin\ProductController::class,'datatable'])->name('product.datatable');
});


require __DIR__.'/auth.php';
