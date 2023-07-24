<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
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

//Категории
Route::prefix("categories")->group(function () {
    Route::get("/", [CategoryController::class, "categoryList"])->name("indexCategory");
    Route::get("create", [CategoryController::class, "createCategory"])->name("categories.create");
    Route::post("create", [CategoryController::class, "storeCategory"])->name("categories.store");
    Route::get("{categoryId}/edit", [CategoryController::class, "editCategory"])->name("categories.edit");
    Route::put("{categoryId}/edit", [CategoryController::class, "updateCategory"])->name("categories.update");
    Route::delete("{categoryId}", [CategoryController::class, "destroyCategory"])->name("categories.delete");
    Route::get('{categoryId}/removeimage', [CategoryController::class, 'removeImage'])->name("category.removeImage");
});
