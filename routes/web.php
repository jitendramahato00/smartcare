<?php
use App\Http\Controllers\HomeController;

use App\Http\Controllers\SiteSettingController;


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
    return view('frontend.index');
});
Route::get('/', [HomeController::class, 'showHome']);

//backend routes

// dashboard route
Route::view('dashboard','backend.dashboard');
Route::view('master', 'backend.layouts.master');

// settings routes
Route::view('/settings/form', 'backend.settings.form');
Route::get('/settings', [SiteSettingController::class, 'index'])->name('site.settings');
Route::post('/settings/update', [SiteSettingController::class, 'update'])->name('site.settings.update');
