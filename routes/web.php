<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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
Route::get('catalog/categories/{category}/', [AppController::class, 'getCategoriesBySubCategories'])->name('app.catalog-by-subCategories');
Route::get('catalog/subCategories/{subcategory}/', [AppController::class, 'getProductsBySubCategories'])->name('app.catalog-by-products');
Route::get("products/show/{product}", [AppController::class, "showProduct"])->name("showProducts");


Route::get("register", [AuthController::class, "registerPage"])->name("auth.register");
Route::post("register", [AuthController::class, "storeUser"])->name("auth.store-user");
Route::post("login", [AuthController::class, "login"])->name("auth.login");
Route::post("logout", [AuthController::class, "logout"])->name("auth.logout");

Route::get("admin", [AdminController::class, "adminIndex"])->middleware('role:super-admin')->name("adminIndex");

//Категории
Route::prefix("categories")->middleware('role:super-admin')->group(function () {
    Route::get("/", [CategoryController::class, "categoryList"])->name("indexCategory");
    Route::get("create", [CategoryController::class, "createCategory"])->name("categories.create");
    Route::post("create", [CategoryController::class, "storeCategory"])->name("categories.store");
    Route::get("{categoryId}/edit", [CategoryController::class, "editCategory"])->name("categories.edit");
    Route::put("{categoryId}/edit", [CategoryController::class, "updateCategory"])->name("categories.update");
    Route::delete("{categoryId}", [CategoryController::class, "destroyCategory"])->name("categories.delete");
    Route::get('{categoryId}/removeimage', [CategoryController::class, 'removeImage'])->name("category.removeImage");
});
//Подкатегории
Route::prefix("subcategories")->middleware('role:super-admin')->group(function () {
    Route::get("/", [SubcategoryController::class, "SubCategoryList"])->name("indexSubCategory");
    Route::get("create", [SubcategoryController::class, "createSubCategory"])->name("Subcategories.create");
    Route::post("create", [SubcategoryController::class, "storeSubCategory"])->name("Subcategories.store");
    Route::get("{subcategoryId}/edit", [SubcategoryController::class, "editSubCategory"])->name("Subcategories.edit");
    Route::put("{subcategoryId}/edit", [SubcategoryController::class, "updateSubCategory"])->name("Subcategories.update");
    Route::delete("{subcategoryId}", [SubcategoryController::class, "destroySubCategory"])->name("Subcategories.delete");
    Route::get('{subcategoryId}/removeimage', [SubcategoryController::class, 'removeImage'])->name("SubCategory.removeImage");
});
//Товары
Route::prefix("products")->middleware('role:super-admin')->group(function () {
    Route::get("/", [ProductController::class, "productList"])->name("indexProduct");
    Route::get("create", [ProductController::class, "createProduct"])->name("products.create");
    Route::post("create", [ProductController::class, "storeProduct"])->name("products.store");
    Route::get("{productId}/edit", [ProductController::class, "editProduct"])->name("products.edit");
    Route::put("{productId}/edit", [ProductController::class, "updateProduct"])->name("products.update");
    Route::delete("{productId}", [ProductController::class, "destroyProduct"])->name("products.delete");
    Route::get('{productId}/removeimage', [ProductController::class, 'removeImage'])->name("products.removeImage");
});

//Пользователи

Route::prefix("users")->middleware('role:super-admin')->group(function () {
    Route::get("/", [UserController::class, "index"])->name("users.index");
    Route::get("{user}/edit", [UserController::class, "edit"])->name("users.edit");
    Route::put("{user}/edit", [UserController::class, "update"])->name("users.update");
});

//Роли
Route::prefix("roles")->middleware('role:super-admin')->group(function () {
    Route::get("/", [RoleController::class, "index"])->name("roles.index");
    Route::get("create", [RoleController::class, "create"])->name("roles.create");
    Route::post("create", [RoleController::class, "store"])->name("roles.store");
    Route::get("{role}/edit", [RoleController::class, "edit"])->name("roles.edit");
    Route::put("{role}/edit", [RoleController::class, "update"])->name("roles.update");
});
