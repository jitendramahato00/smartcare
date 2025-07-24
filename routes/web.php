<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteSettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\GeminiController;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\AdminhospitalController; // Ise add karna zaroori hai
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ConsultationController;

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
    Mail::raw('This is the email body.', function() {
    $messaage->from('your_email@example.com', 'Your Name')->
    to('reeipt@example.com')
            ->subject('Simple Email Subject');
    });
    return view('frontend.index');
});
Route::get('/', [HomeController::class, 'showHome'])->name('frontend.index');

//backend routes

//admin dashboard route
route::view('/dashboard','backend.dashboard')->name('backend.dashboard');
route::view('/master', 'backend.layouts.master')->name('backend.layouts.master');




// Doctor Dashboard ka simple route
route::view('/doctor','doctors.doctor')->name('doctors.doctor');
route::view('/doctor-appointments','doctors.manages.appointment')->name('manages.appointment');


// Doctor list dikhane ke liye
Route::get('/doctor-list', [AdminhospitalController::class, 'index'])->name('forms.index');

// Doctor add karne ke form ke liye
Route::get('/doctor-add', [AdminhospitalController::class, 'create'])->name('doctors.create');

// Doctor data store karne ke liye (form submit POST)
Route::post('/doctorstore', [AdminhospitalController::class, 'store'])->name('doctors.store');


// Doctor edit karne ke liye
Route::prefix('doctor')->group(function () {
    Route::get('/{id}/edit', [AdminhospitalController::class, 'edit'])->name('doctors.edit');
    Route::put('/{id}/update', [AdminhospitalController::class, 'update'])->name('doctor.update');
});

// Doctor delete karne ke liye
Route::delete('doctor/{id}', [AdminhospitalController::class, 'destroy'])->name('forms.destroy');


// Admin hospital routes
route::view('/hospital','frontend.hospitals.index')->name('frontend.hospitals.index');
route::view('/doctor-profile','frontend.hospitals.sections.doctor-profile')->name('doctor.profile');


// Yeh route '/hospital' URL ko WelcomeController ke index() method se jodega.
Route::get('/hospital', [WelcomeController::class, 'index'])->name('hospital.index');

// Yeh route '/doctor-profile/1', '/doctor-profile/2' etc. URLs ko showProfile() method se jodega.
Route::get('/doctor-profile/{id}', [WelcomeController::class, 'showProfile'])->name('doctor.profile');


// Admin hospital CRUD operations
Route::delete('doctor/{id}', [AdminhospitalController::class, 'destroy'])->name('doctors.destroy');


//Book appointment routes
route::view('/patients-appointments','frontend.hospitals.appointments.book')->name('book.appointments');









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
Route::post('/login-submit', [LoginController::class, 'login'])->name('login.submit');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin dashboard (GET route + protected)
Route::get('/admin', [LoginController::class, 'dashboard'])->name('admin')->middleware(['role:admin']);

// backend Users CRUD operation
Route::prefix('backend')->name('backend.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class); // Modern syntax
});

//location routes
Route::prefix('backend')->name('backend.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('locations', LocationController::class); // Modern syntax
});


// Admin dashboard (only for admin role)
Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->name('backend.dashboard')->middleware(['auth', 'role:admin']);

// Doctor dashboard (only for doctor role)
Route::get('/doctor', function () {
    return view('doctors.doctor');
})->name('doctors.doctor')->middleware(['auth', 'role:doctor']);



// Form dikhane ke liye (provider bind hoga)
Route::get('/checkout/{provider}', [ConsultationController::class, 'create'])
    ->name('checkout.create');

// Form submit/store ke liye (POST hi rakhiye)
Route::post('/checkout', [ConsultationController::class, 'store'])
    ->name('checkout.store');



    Route::get('/patients-appointments/{provider}', [ConsultationController::class, 'create'])
    ->name('appointments.book');

Route::post('/patients-appointments', [ConsultationController::class, 'store'])
    ->name('appointments.store');





