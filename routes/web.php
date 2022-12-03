<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MyaccountController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', [HomeController::class, 'index'] )->name('home');
Route::post('/getsubcatgory', [ReviewController::class, 'subcategory'])->name('getsubcategory');
Route::post('/getproductbysubcategory', [ReviewController::class, 'getproductbysubcategory'])->name('getproductbysubcategory');
Route::get('/product', [HomeController::class, 'productlist'] )->name('productlist');
Route::get('/product/{product_slug}', [HomeController::class, 'singleProduct'] )->name('singleProduct');
Route::get('/category/{category_slug}', [HomeController::class, 'category'] )->name('category.list');
Route::get('/subcatgory/{category_slug}/{subcategory_slug}', [HomeController::class, 'subcategory'] )->name('subcategory.list');
//Route::get('/product/{produt_id}/{produc_slug}', [HomeController::class, 'subcategory'] )->name('produreview.list');
Route::post('upload/media',  [ReviewController::class, 'uploadmedia'])->name('uploadmedia');
Route::post('upload/media/remove',  [ReviewController::class, 'removemedia'])->name('removemedia');



Route::get('/clear-cache',  function () {
    Artisan::call('optimize:clear');
});
Route::get('/migrate',  function () {
    Artisan::call('migrate');
});
Route::post("uniqueMobile", [UserController::class, 'checkMobileNo'])->name('unique.mobile.check');
Route::post("uniqueEmail", [UserController::class, 'checkEmailId'])->name('unique.email.check');
Route::get('/dashboard',  function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::post("user/register", [UserController::class, 'register'])->name('user.register');
Route::get("submit/review", [ReviewController::class, 'index'])->name('submit.review');
Route::post("submit/review/store", [ReviewController::class, 'store'])->name('submit.review.store');
Route::post("submit/review/update", [ReviewController::class, 'update'])->name('submit.review.update');
Route::get("create/review/{product}", [ReviewController::class, 'create'])->name('submit.review.product');
Route::post("/checkAlreadyReview", [ReviewController::class, 'checkAlreadyReview'])->name('checkAlreadyReview');
Route::get("/assignReviewtoUser/{review_id}",  [ReviewController::class, 'assignuser'])->name('assignuser');
// login
Route::get('myaccount', [MyaccountController::class, 'index'] )->name('myaccount');
Route::post('profile/update', [MyaccountController::class, 'profileupdate'] )->name('profile.update');
Route::post('profile/change-password', [MyaccountController::class, 'changepassword'] )->name('profile.changepassword');
Route::post('review/list',  [MyaccountController::class, 'userReviewlist'])->name('userReviewlist');
Route::get('review/edit/{id}',  [ReviewController::class, 'edit'])->name('review.edit');
Route::get('myaccount', [MyaccountController::class, 'index'] )->name('myaccount');
Route::get('user/confirm', [UserController::class, 'confirmation'] )->name('confirmation');




require __DIR__.'/auth.php';
