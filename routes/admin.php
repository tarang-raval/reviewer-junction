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

Route::get('/admin/login', [\App\Http\Controllers\Admin\UsersController::class,'login'])->name('admin.login');
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => '\App\Http\Controllers\Admin',
    'middleware' => ['auth.basic','admin']
], function () {



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

     Route::get('user', [\App\Http\Controllers\Admin\UsersController::class,'index'])->name('user.index');
     Route::post('user/list', [\App\Http\Controllers\Admin\UsersController::class,'datatable'])->name('user.datatable');

    //Product
    Route::resource('product', ProductController::class);
    Route::post('product/list', [\App\Http\Controllers\Admin\ProductController::class,'datatable'])->name('product.datatable');

    //points
    Route::resource('points', PointsController::class);
    Route::post('points/list', [\App\Http\Controllers\Admin\PointsController::class,'datatable'])->name('points.datatable');


    //Review
    Route::resource('review',ReviewController::class);
    Route::post('review/list', [\App\Http\Controllers\Admin\ReviewController::class,'datatable'])->name('review.datatable');
    Route::post('review/statusupdate', [\App\Http\Controllers\Admin\ReviewController::class,'statusupdate'])->name('review.statusupdate');


    // setting
    Route::resource('setting', SiteSettingController::class);
    Route::post('upload/media', [\App\Http\Controllers\Admin\ProductController::class,'uploadmedia'])->name('uploadmedia');
    Route::post('upload/media/remove', [\App\Http\Controllers\Admin\ProductController::class,'removemedia'])->name('removemedia');


});
Route::post('admin/logout', [\App\Http\Controllers\Admin\UsersController::class,'logout'])->name('admin.user.logout');

require __DIR__.'/auth.php';
