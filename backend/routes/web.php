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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin'], function () {

    Route::post('/services-store', [App\Http\Controllers\ServicesController::class, 'store'])->name('services_store');
    Route::get('/services-show/{id}', [App\Http\Controllers\ServicesController::class, 'show'])->name('admin.services_show');
    Route::get('/services-delete/{id}', [App\Http\Controllers\ServicesController::class, 'delete'])->name('admin.services_delete');
    
    Route::post('/clients-store', [App\Http\Controllers\ClientsController::class, 'store'])->name('admin.clients_store');
    Route::get('/clients-show/{id}', [App\Http\Controllers\ClientsController::class, 'show'])->name('admin.clients_show');
    Route::get('/clients-delete/{id}', [App\Http\Controllers\ClientsController::class, 'delete'])->name('admin.clients_delete');

    Route::post('/pages-store', [App\Http\Controllers\PagesController::class, 'store'])->name('admin.pages_store');
    Route::get('/pages-show/{id}', [App\Http\Controllers\PagesController::class, 'show'])->name('admin.pages_show');

    Route::post('/fonts-store', [App\Http\Controllers\FontsController::class, 'store'])->name('admin.fonts_store');
    Route::get('/fonts-show/{id}', [App\Http\Controllers\FontsController::class, 'show'])->name('admin.fonts_show');
    Route::get('/fonts-delete/{id}', [App\Http\Controllers\FontsController::class, 'delete'])->name('admin.fonts_delete');

    Route::post('/users-store', [App\Http\Controllers\UsersController::class, 'store'])->name('admin.users_store');
    Route::get('/users-show/{id}', [App\Http\Controllers\UsersController::class, 'show'])->name('admin.users_show');

    Route::post('/settings-store', [App\Http\Controllers\SettingsController::class, 'store'])->name('admin.settings_store');
    Route::get('/settings-show/{id}', [App\Http\Controllers\SettingsController::class, 'show'])->name('admin.settings_show');

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

