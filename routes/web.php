<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

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

Route::get('/run-migrations', function () {
    Artisan::call('migrate', ['--force' => true]);
    return '✅ Migrations ran successfully!';
});

Route::get('/', function () {
    return view('welcome');
});


Route::get('/search-history', [App\Http\Controllers\WeatherController::class, 'viewSearchHistory'])->name('history')->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/weather', [App\Http\Controllers\WeatherController::class, 'index']);
Route::get('/show', [App\Http\Controllers\WeatherController::class, 'getWeatherData'])->name('show');
