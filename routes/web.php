<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AchievementsController;
use App\Http\Controllers\AdministrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleriesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsAndEventsController;
use App\Http\Controllers\NewsEventController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\PrincipalsController;

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
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/history', [HistoryController::class, 'index'])->name('history');
Route::get('/overview', [OverviewController::class, 'index'])->name('overview');
Route::get('/past-principals', [PrincipalsController::class, 'index'])->name('principals');
Route::get('/principal', [PrincipalController::class, 'index'])->name('principal');
Route::get('/administration', [AdministrationController::class, 'index'])->name('administration');
Route::get('/gallery', [GalleriesController::class, 'index'])->name('gallery');
Route::get('/achievements', [AchievementsController::class, 'index'])->name('achievements');
Route::get('/news-events', [NewsAndEventsController::class, 'index'])->name('news-events');

// Public Details Routes
Route::get('/news-events/{id}', [NewsAndEventsController::class, 'show'])->name('news-events.show');
Route::get('/achievements/{id}', [AchievementsController::class, 'show'])->name('achievements.show');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/verify-otp', [AuthController::class, 'showOtpForm'])->name('verify.otp');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink']);
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password/{token}', [AuthController::class, 'resetPassword']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protect all admin-related routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/{id}', [GalleryController::class, 'show'])->name('gallery.show');
    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // Achievement Admin Routes
    Route::get('/achievements/create', [AchievementController::class, 'create'])->name('achievements.create');
    Route::post('/achievements/store', [AchievementController::class, 'store'])->name('achievements.store');
    Route::get('/achievements/{id}/edit', [AchievementController::class, 'edit'])->name('achievements.edit');
    Route::put('/achievements/{id}', [AchievementController::class, 'update'])->name('achievements.update');
    Route::delete('/achievements/{id}', [AchievementController::class, 'destroy'])->name('achievements.destroy');

    // News & Events Admin Routes
    Route::get('/news-events/create', [NewsEventController::class, 'create'])->name('news-events.create');
    Route::post('/news-events/store', [NewsEventController::class, 'store'])->name('news-events.store');
    Route::get('/news-events/{id}/edit', [NewsEventController::class, 'edit'])->name('news-events.edit');
    Route::put('/news-events/{id}', [NewsEventController::class, 'update'])->name('news-events.update');
    Route::delete('/news-events/{id}', [NewsEventController::class, 'destroy'])->name('news-events.destroy');
});

// Remove or adjust fallback to avoid interference
Route::fallback(function () {
    return redirect()->route('login')->with('error', 'Page not found. Redirecting to login.');
})->where('any', '.*');
