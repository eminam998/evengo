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

Route::get('/', 'App\Http\Controllers\IndexController@index')->name('home');

Route::get('/sign-in', 'App\Http\Controllers\SignInController@index')->name('sign-in');
Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('contact');
Route::get('/all-companies', 'App\Http\Controllers\CompanyController@index')->name('all-companies');
Route::get('/news', 'App\Http\Controllers\NewsController@index')->name('all-news');
Route::get('/event', 'App\Http\Controllers\EventController@index')->name('all-events');
Route::get('/view-event/{id}', 'App\Http\Controllers\EventController@show')->name('view-event');
Route::put('/subscribe/{id}', 'App\Http\Controllers\EventController@subscribe')->name('subscribe');
Route::get('/view-news/{id}', 'App\Http\Controllers\NewsController@show')->name('view-news');
Route::get('/about-company/{id}', 'App\Http\Controllers\CompanyController@show')->name('company.about');
Route::post('/send-message', 'App\Http\Controllers\ContactController@sendMessage')->name('send.message');
Route::post('/sign-in/send-request', 'App\Http\Controllers\SignInController@signInRequest')->name('send.request');
Route::get('/about', function () {
    return Inertia::render('Main/About');
})->name('about');
Route::get('/accepted', function () {
    return Inertia::render('Main/Accepted');
})->name('accepted');
Route::get('/denied', function () {
    return Inertia::render('Main/Denied');
})->name('denied');
Route::get('/sign-in/success', function () {
    return Inertia::render('Main/AfterSignIn');
})->name('sign-in.success');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group([
    'namespace' => 'App\Http\Controllers\Superadmin',
    'prefix' => 'superadmin',
    'middleware' => ['auth'],
], function () {
    Route::get('/', 'DashboardController@index')->name('superadmin');
    Route::resource('user', 'UserController');
    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
    Route::resource('category', 'CategoryController');
    Route::resource('location', 'LocationController');
    Route::resource('superadmin-news', 'AllNewsController');
    Route::get('approve-user/{id}', 'UserController@approve')->name('user.approve');
    Route::get('deny-user/{id}', 'UserController@deny')->name('user.deny');
    Route::get('view-company/{id}', 'UserController@viewCompany')->name('user.viewCompany');
    Route::resource('messages', 'ContactController');
    Route::post('send-reply', 'ContactController@sendReply')->name('send.reply');
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