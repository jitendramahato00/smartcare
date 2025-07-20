<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteSettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;




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
Route::get('/', [HomeController::class, 'showHome'])->name('frontend.index');

//backend routes

//admin dashboard route
route::view('/dashboard','backend.dashboard')->name('backend.dashboard');
route::view('/master', 'backend.layouts.master')->name('backend.layouts.master');

//doctors dashboard route
route::view('/doctor','doctors.doctor')->name('doctors.doctor');
route::view('/master', 'backend.layouts.master')->name('backend.layouts.master');
Route::view('/doctor-appointments','doctors.manages.appointment')->name('manages.appointment');
Route::view('/doctor-add','doctors.settings.add-doctor')->name('settings.add-doctor');

//patients dashboard route
route::view('/patient','patients.patient')->name('patients.patient');
route::view('/master', 'patients.layouts.master')->name('patients.layouts.master');

// settings routes
route::view('/settings/form', 'backend.settings.form')->name('backend.settings.form');
Route::get('/settings', [SiteSettingController::class, 'index'])->name('site.settings');
Route::post('/settings/update', [SiteSettingController::class, 'update'])->name('site.settings.update');


//signup routes

Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup-submit', [SignupController::class, 'signup'])->name('signup.submit');

 

// Login form show
Route::view('/login', 'frontend.login')->name('login');

// Login form submit
Route::post('/login-submit', 'LoginController@login')->name('login.submit');
Route::get('/logout', 'LoginController@logout')->name('logout');

// // Admin dashboard (GET route + protected)
// Route::get('/admin', 'LoginController@dashboard') ->name('admin') ->middleware(['role:admin']);
// Route::get('/doctor-dashboard', 'LoginController@dashboard') ->name('doctor') ->middleware(['role:doctor']);


// Admin dashboard protected route
Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->name('backend.dashboard')->middleware(['auth', 'role:admin']);

// Doctor dashboard protected route
Route::get('/doctor', function () {
    return view('doctors.doctor');
})->name('doctors.doctor')->middleware(['auth', 'role:doctor']);

