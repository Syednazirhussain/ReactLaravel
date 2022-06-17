<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/pages', [App\Http\Controllers\ApiController::class, 'pages'])->name('admin.pages');
Route::get('/services', [App\Http\Controllers\ApiController::class, 'services'])->name('admin.services');
Route::get('/users', [App\Http\Controllers\ApiController::class, 'users'])->name('admin.users');
Route::get('/settings', [App\Http\Controllers\ApiController::class, 'settings'])->name('admin.settings');
Route::get('/clients', [App\Http\Controllers\ApiController::class, 'clients'])->name('admin.clients');
Route::get('/fonts', [App\Http\Controllers\ApiController::class, 'fonts'])->name('admin.fonts');
