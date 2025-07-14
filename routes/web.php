<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
// Route::post('/reset-password', 'App\Http\Controllers\AuthController@resetPassword');
Route::post('/reset-password/{token}', 'App\Http\Controllers\AuthController@resetPassword')->name('password.reset');
Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

// Admin routes
// Route::middleware(['auth', 'admin'])->group(function () {
Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard')->middleware(['web', 'auth', 'admin']);
// });

Route::fallback(function () {
    return view('page.web.404');
})->where('any', '.*');
