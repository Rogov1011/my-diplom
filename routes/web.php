<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AppController::class, 'mainPage'])->name("mainPage");


Route::get("register", [AuthController::class, "registerPage"])->name("auth.register");
Route::post("register", [AuthController::class, "storeUser"])->name("auth.store-user");
Route::post("login", [AuthController::class, "login"])->name("auth.login");
Route::post("logout", [AuthController::class, "logout"])->name("auth.logout");

Route::get("admin", [AdminController::class, "adminIndex"])->name("adminIndex");
