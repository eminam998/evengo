<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::get('/sign-in', 'App\Http\Controllers\SignInController@index')->name('sign-in');
Route::post('/sign-in/send-request', 'App\Http\Controllers\SignInController@signInRequest')->name('send.request');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group([
    'namespace' => 'App\Http\Controllers\Superadmin',
    'prefix' => 'superadmin',
    'middleware' => ['auth'],
], function () {
    Route::get('/superadmin', function () {
        return Inertia::render('Superadmin/Dashboard');
    })->name('superadmin');
    Route::resource('user', 'UserController');
    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
    Route::resource('category', 'CategoryController');
    Route::resource('location', 'LocationController');
    Route::get('approve-user/{id}', 'UserController@approve')->name('user.approve');
    Route::get('deny-user/{id}', 'UserController@deny')->name('user.deny');
    Route::get('view-company/{id}', 'UserController@viewCompany')->name('user.viewCompany');


});

Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    'prefix' => 'admin',
    'middleware' => ['auth'],
], function () {
    Route::get('/', 'DashboardController@index')->name('admin');
    Route::resource('company', 'CompanyController');
    Route::resource('news', 'NewsController');
    Route::resource('event', 'EventController');
});