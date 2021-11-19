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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::get('/account', [App\Http\Controllers\HomeController::class, 'account'])->name('account');

Route::get('/subscriptions', [App\Http\Controllers\HomeController::class, 'subscriptions'])->name('subscriptions');

Route::get('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings');

Route::get('/upload', [App\Http\Controllers\HomeController::class, 'upload'])->name('upload');

Route::get('/upload-video', [App\Http\Controllers\HomeController::class, 'uploadVideo'])->name('uploadVideo');

Route::get('/categories', [App\Http\Controllers\HomeController::class, 'categories'])->name('categories');

Route::get('/channels', [App\Http\Controllers\HomeController::class, 'channels'])->name('channels');

Route::get('/single-channel', [App\Http\Controllers\HomeController::class, 'singleChannel'])->name('singleChannel');

Route::get('/video-page', [App\Http\Controllers\HomeController::class, 'videoPage'])->name('videoPage');

Route::get('/history-page', [App\Http\Controllers\HomeController::class, 'historyPage'])->name('historyPage');

Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'updateProfile'])->name('profile.update');