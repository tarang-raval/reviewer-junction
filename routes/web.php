<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
});
Route::post("uniqueMobile",[UserController::class,'checkMobileNo'])->name('unique.mobile.check');
Route::post("uniqueEmail",[UserController::class,'checkEmailId'])->name('unique.email.check');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::post("user/register",[UserController::class,'register'])->name('user.register');

require __DIR__.'/auth.php';
