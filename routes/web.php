<?php

use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromocodeController;
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
Route::get('/searchCatalog', [AppController::class, 'searchProduct'])->name("searchProduct");
Route::get('catalog/categories/{category}/', [AppController::class, 'getCategoriesBySubCategories'])->name('app.catalog-by-subCategories');
Route::get('catalog/subCategories/{subcategory}/', [AppController::class, 'getProductsBySubCategories'])->name('app.catalog-by-products');
Route::get("products/show/{product}", [AppController::class, "showProduct"])->name("showProducts");
Route::get("banPage", [AppController::class, "isBan"])->name("banPage");
Route::get("contacts", [AppController::class, "contacts"])->name("contacts");
Route::get("user_agreement", [AppController::class, "user_agreement"])->name("user_agreement");
Route::get("sertificat", [AppController::class, "sertificat"])->name("sertificat");
Route::get("payment", [AppController::class, "payment"])->name("payment");
Route::get("warranty", [AppController::class, "warranty"])->name("warranty");
Route::get("categories/{category}/sub", [AppController::class, "subcategoryPupop"]);

Route::post("logout", [AuthController::class, "logout"])->name("auth.logout");

Route::middleware("guest")->group(function () {
    Route::get("register", [AuthController::class, "registerPage"])->name("auth.register");
    Route::post("register", [AuthController::class, "storeUser"])->name("auth.store-user");
    Route::post("login", [AuthController::class, "login"])->name("auth.login");
});

Route::middleware(['role:user|super-admin', "isBan"])->group(function () {
    Route::get("add-to-cart/{product}/", [CartController::class, 'addToCart'])->name('cart.add-product');
    Route::get("cart", [CartController::class, 'cartPage'])->name('cart');
    Route::put("cart/items/{item}/edit", [CartController::class, 'changeQty'])->name('cart.items.qty-update');
    Route::delete("cart/items/{item}", [CartController::class, 'destroy'])->name('cart.items.destroy');
});
Route::middleware('role:super-admin')->group(function () {
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
    //Подкатегории
    Route::prefix("subcategories")->group(function () {
        Route::get("/", [SubcategoryController::class, "SubCategoryList"])->name("indexSubCategory");
        Route::get("/searchSubcategory", [SubcategoryController::class, "searchSubcategory"])->name("searchSubcategory");
        Route::get("create", [SubcategoryController::class, "createSubCategory"])->name("Subcategories.create");
        Route::post("create", [SubcategoryController::class, "storeSubCategory"])->name("Subcategories.store");
        Route::get("{subcategoryId}/edit", [SubcategoryController::class, "editSubCategory"])->name("Subcategories.edit");
        Route::put("{subcategoryId}/edit", [SubcategoryController::class, "updateSubCategory"])->name("Subcategories.update");
        Route::delete("{subcategoryId}", [SubcategoryController::class, "destroySubCategory"])->name("Subcategories.delete");
        Route::get('{subcategoryId}/removeimage', [SubcategoryController::class, 'removeImage'])->name("SubCategory.removeImage");
    });
    //Товары
    Route::prefix("products")->group(function () {
        Route::get("/", [ProductController::class, "productList"])->name("indexProduct");
        Route::get("/search", [ProductController::class, "search"])->name("search");
        Route::get("create", [ProductController::class, "createProduct"])->name("products.create");
        Route::post("create", [ProductController::class, "storeProduct"])->name("products.store");
        Route::get("{productId}/edit", [ProductController::class, "editProduct"])->name("products.edit");
        Route::put("{productId}/edit", [ProductController::class, "updateProduct"])->name("products.update");
        Route::delete("{productId}", [ProductController::class, "destroyProduct"])->name("products.delete");
        Route::get('{productId}/removeimage', [ProductController::class, 'removeImage'])->name("products.removeImage");
    });

    //Пользователи

    Route::prefix("users")->group(function () {
        Route::get("/", [UserController::class, "index"])->name("users.index");
        Route::get("{user}/edit", [UserController::class, "edit"])->name("users.edit");
        Route::put("{user}/edit", [UserController::class, "update"])->name("users.update");
        Route::put("{user}/ban", [UserController::class, "banUser"])->name("users.ban");
        Route::resource('orders', AdminOrderController::class);
        Route::get('change-order-status/{order}', [AdminOrderController::class, "changeStatus"])->name("order.change-status");
        Route::resource('promocodes', PromocodeController::class);
    });

    //Роли
    Route::prefix("roles")->group(function () {
        Route::get("/", [RoleController::class, "index"])->name("roles.index");
        Route::get("create", [RoleController::class, "create"])->name("roles.create");
        Route::post("create", [RoleController::class, "store"])->name("roles.store");
        Route::get("{role}/edit", [RoleController::class, "edit"])->name("roles.edit");
        Route::put("{role}/edit", [RoleController::class, "update"])->name("roles.update");
    });

    //Картинки на главную
    Route::resource('images', ImageController::class);
});
Route::middleware(['role:user|super-admin', "isBan"])->group(function () {
    //Заказы
    Route::get('checkout', [OrderController::class, "checkoutPage"])->middleware('role:user|super-admin')->name("app.checkout");
    Route::post('checkout', [OrderController::class, "storeOrder"])->middleware('role:user|super-admin')->name("app.storeOrder");
    Route::get('order/{order}/thankyou', [OrderController::class, "thankyouPage"])->middleware('role:user|super-admin')->name("app.order-thankyou");
    Route::get("orders/status", [OrderController::class, "orders"])->middleware('role:user|super-admin')->name("orders");

    //Промокоды
    Route::post('cart/set-promocode', [CartController::class, 'applyPromocode'])->middleware('role:user|super-admin')->name('cart-apply-promocode');
    Route::get('cart/unset-promocode', [CartController::class, 'cancelPromocode'])->middleware('role:user|super-admin')->name('cart-cancel-promocode');
});
