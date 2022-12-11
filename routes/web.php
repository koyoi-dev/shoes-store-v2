<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ShoeController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\StyleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::group(['middleware' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::resource('dashboard/brands', BrandController::class);
    Route::resource('dashboard/categories', CategoryController::class);
    Route::resource('dashboard/styles', StyleController::class);
    Route::get('dashboard/sizes', [SizeController::class, 'index'])->name('sizes.index');
    Route::get('dashboard/sizes/{size}', [SizeController::class, 'show'])->name('sizes.show');
    Route::resource('dashboard/shoes', ShoeController::class);
});
