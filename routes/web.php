<?php

use App\Http\Controllers\AchievementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsEventController;

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

// Existing routes
Route::get('/', 'App\Http\Controllers\IndexController@index')->name('index');
Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('contact');
Route::get('/history', 'App\Http\Controllers\HistoryController@index')->name('history');
Route::get('/overview', 'App\Http\Controllers\OverviewController@index')->name('overview');
Route::get('/past-principals', 'App\Http\Controllers\PrincipalsController@index')->name('principals');
Route::get('/principal', 'App\Http\Controllers\PrincipalController@index')->name('principal');
Route::get('/administration', 'App\Http\Controllers\AdministrationController@index')->name('administration');
Route::get('/comingsoon', 'App\Http\Controllers\ComingsoonController@index')->name('comingsoon');
Route::get('/achievements', 'App\Http\Controllers\AchievementsController@index')->name('achievements');
Route::get('/news-events', 'App\Http\Controllers\NewsAndEventsController@index')->name('news-events');

// Authentication routes
Route::get('/login', 'App\Http\Controllers\AuthController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::get('/register', 'App\Http\Controllers\AuthController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::get('/verify-otp', 'App\Http\Controllers\AuthController@showOtpForm')->name('verify.otp');
Route::post('/verify-otp', 'App\Http\Controllers\AuthController@verifyOtp');
Route::get('/forgot-password', 'App\Http\Controllers\AuthController@showForgotPasswordForm')->name('password.request');
Route::post('/forgot-password', 'App\Http\Controllers\AuthController@sendResetLink');
Route::get('/reset-password/{token}', 'App\Http\Controllers\AuthController@showResetForm')->name('password.reset');
Route::post('/reset-password/{token}', 'App\Http\Controllers\AuthController@resetPassword')->name('password.reset');
Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard')->middleware(['web', 'auth', 'admin']);
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/{id}', [GalleryController::class, 'show'])->name('gallery.show');
    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // Achievement Routes
    Route::get('/achievements/create', [AchievementController::class, 'create'])->name('achievements.create');
    Route::post('/achievements/store', [AchievementController::class, 'store'])->name('achievements.store');
    Route::get('/achievements/{id}', [AchievementController::class, 'show'])->name('achievements.show');
    Route::get('/achievements/{id}/edit', [AchievementController::class, 'edit'])->name('achievements.edit');
    Route::put('/achievements/{id}', [AchievementController::class, 'update'])->name('achievements.update');
    Route::delete('/achievements/{id}', [AchievementController::class, 'destroy'])->name('achievements.destroy');

    // routes for News & Events
    Route::get('/news-events/create', [NewsEventController::class, 'create'])->name('news-events.create');
    Route::post('/news-events/store', [NewsEventController::class, 'store'])->name('news-events.store');
    Route::get('/news-events/{id}', [NewsEventController::class, 'show'])->name('news-events.show');
    Route::get('/news-events/{id}/edit', [NewsEventController::class, 'edit'])->name('news-events.edit');
    Route::put('/news-events/{id}', [NewsEventController::class, 'update'])->name('news-events.update');
    Route::delete('/news-events/{id}', [NewsEventController::class, 'destroy'])->name('news-events.destroy');
});

// Fallback to redirect unauthorized access
Route::fallback(function () {
    return redirect()->route('login')->with('error', 'Unauthorized access. Please log in.');
})->where('any', '.*');
