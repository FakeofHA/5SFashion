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

Route::controller(App\Http\Controllers\Api\AuthController::class)->group(function () {
    Route::post('register', 'register')->middleware('register');
    Route::post('login','login')->middleware('login');
    Route::post('logout', 'logout')->middleware('fakeAuth');
    Route::get('information', 'information')->middleware('fakeAuth');
});

Route::controller(App\Http\Controllers\Api\EmployeeController::class)->group(function () {
    Route::get('employee', 'index')->middleware(['fakeAuth', 'role:admin']);
    Route::post('employee', 'store')->middleware(['fakeAuth', 'role:admin', 'register']);
    Route::get('employee/{id}', 'show')->middleware(['fakeAuth', 'role:admin']);
    Route::post('employee/{id}', 'update')->middleware(['fakeAuth', 'role:admin', 'employeeUpdate']);
    Route::delete('employee/{id}', 'destroy')->middleware(['fakeAuth', 'role:admin']);
});

Route::controller(App\Http\Controllers\Api\SegmentController::class)->group(function () {
    Route::get('segment', 'index')->middleware(['fakeAuth', 'role:employee']);
});

Route::controller(App\Http\Controllers\Api\ClassifyController::class)->group(function () {
    Route::get('classify', 'index')->middleware(['fakeAuth', 'role:employee']);
    Route::post('classify', 'store')->middleware(['fakeAuth', 'role:admin', 'classifyStore']);
    Route::get('classify/{id}', 'show')->middleware(['fakeAuth', 'role:employee']);
    Route::post('classify/{id}', 'update')->middleware(['fakeAuth', 'role:admin', 'classifyUpdate']);
    Route::delete('classify/{id}', 'destroy')->middleware(['fakeAuth', 'role:admin']);
});

Route::controller(App\Http\Controllers\Api\SizeController::class)->group(function () {
    Route::get('size', 'index')->middleware(['fakeAuth', 'role:employee']);
    Route::post('size', 'store')->middleware(['fakeAuth', 'role:admin', 'sizeStore']);
    Route::get('size/{id}', 'show')->middleware(['fakeAuth', 'role:employee']);
    Route::post('size/{id}', 'update')->middleware(['fakeAuth', 'role:admin', 'sizeUpdate']);
    Route::delete('size/{id}', 'destroy')->middleware(['fakeAuth', 'role:admin']);
});
