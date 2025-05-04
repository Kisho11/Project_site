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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\IndexController@index')->name('index');
Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('contact');
Route::get('/history', 'App\Http\Controllers\HistoryController@index')->name('history');
Route::get('/overview', 'App\Http\Controllers\OverviewController@index')->name('overview');
Route::get('/past-principals', 'App\Http\Controllers\PrincipalsController@index')->name('principals');
Route::get('/principal', 'App\Http\Controllers\PrincipalController@index')->name('principal');
Route::get('/administration', 'App\Http\Controllers\AdministrationController@index')->name('administration');
Route::get('/comingsoon', 'App\Http\Controllers\ComingsoonController@index')->name('comingsoon');


Route::fallback(function () {
    return view('page.web.404');
})->where('any', '.*');
