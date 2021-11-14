<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('layouts.app');
});

Route::middleware('guest-custom')->group(function () {
    Route::get('/', function () {
        return redirect("/data-sample");
    });

    Route::get('/login', [UserController::class, 'loginView']);
    Route::post('/login', [UserController::class, 'login']);

});

Route::middleware('auth-custom')->group(function () {
    Route::get('/data-sample', [UserController::class, 'mainView'])->name('home');
    Route::post('/data-sample', [UserController::class, 'getSampleData']);
    Route::post('/logout', [UserController::class, 'logout']);
});