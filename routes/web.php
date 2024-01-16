<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\UrdanController;
use App\Http\Controllers\Admin\AdminController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get("/", [
    "uses"      => "App\Http\Controllers\Front\UrdanController@index",
    "as"        => "/"
]);

Route::get("/category-page/{id}", [
    "uses"      => "App\Http\Controllers\Front\UrdanController@categoryPage",
    "as"        => "category-page"
]);

Route::get("/about}", [
    "uses"      => "App\Http\Controllers\Front\UrdanController@about",
    "as"        => "about"
]);

Route::get("//get-product-info-for-modal", [
    "uses"      => "App\Http\Controllers\Front\UrdanController@getProductInfoForModal",
    "as"        => "/get-product-info-for-modal"
]);
Route::get("/product-page", [
    "uses"      => "App\Http\Controllers\Front\UrdanController@productPage",
    "as"        => "product-page"
]);
Route::get("/product-details/{id}", [
    "uses"      => "App\Http\Controllers\Front\UrdanController@productDetails",
    "as"        => "product-details"
]);
Route::post("/add-to-cart", [
    "uses"      => "App\Http\Controllers\Front\CartController@addToCart",
    "as"        => "add-to-cart"
]);
Route::get("/view-cart", [
    "uses"      => "App\Http\Controllers\Front\CartController@viewCart",
    "as"        => "view-cart"
]);

Route::get("/remove-product-from-cart/{id}", [
    "uses"      => "App\Http\Controllers\Front\CartController@removeProductFromCart",
    "as"        => "remove-product-from-cart"
]);
Route::get("/checkout", [
    "uses"      => "App\Http\Controllers\Front\UrdanController@checkout",
    "as"        => "checkout"
]);
Route::post("/checkout-form", [
    "uses"      => "App\Http\Controllers\Front\UrdanController@checkoutForm",
    "as"        => "checkout-form"
]);

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});

Route::get("/dashboard", [
    "uses"      => "App\Http\Controllers\Admin\AdminController@index",
    "as"        => "dashboard",
    "middleware"    => ["auth:sanctum", "verified"]
]);

Route::group(["middleware" => ["auth:sanctum", "verified"]], function(){

    //Category routes
    Route::get("/add-category", [
        "uses"      => "App\Http\Controllers\Admin\CategoryController@addCategory",
        "as"        => "add-category",
    ]);
    Route::post("/new-category", [
        "uses"      => "App\Http\Controllers\Admin\CategoryController@newCategory",
        "as"        => "new-category",
    ]);
    Route::get("/manage-category", [
        "uses"      => "App\Http\Controllers\Admin\CategoryController@manageCategory",
        "as"        => "manage-category",
    ]);
    Route::get("/edit-category/{id}", [
        "uses"      => "App\Http\Controllers\Admin\CategoryController@editCategory",
        "as"        => "edit-category",
    ]);
    Route::post("/update-category", [
        "uses"      => "App\Http\Controllers\Admin\CategoryController@updateCategory",
        "as"        => "update-category",
    ]);
    Route::get("/delete-category/{id}", [
        "uses"      => "App\Http\Controllers\Admin\CategoryController@deleteCategory",
        "as"        => "delete-category",
    ]);

    //Sub-Category routes
    Route::get("/add-subcategory", [
        "uses"      => "App\Http\Controllers\Admin\SubCategoryController@addSubCategory",
        "as"        => "add-subcategory",
    ]);
    Route::post("/new-subcategory", [
        "uses"      => "App\Http\Controllers\Admin\SubCategoryController@newSubCategory",
        "as"        => "new-subcategory",
    ]);
    Route::get("/manage-subcategory", [
        "uses"      => "App\Http\Controllers\Admin\SubCategoryController@manageSubCategory",
        "as"        => "manage-subcategory",
    ]);
    Route::get("/edit-subcategory/{id}", [
        "uses"      => "App\Http\Controllers\Admin\SubCategoryController@editSubCategory",
        "as"        => "edit-subcategory",
    ]);
    Route::post("/update-subcategory", [
        "uses"      => "App\Http\Controllers\Admin\SubCategoryController@updateSubCategory",
        "as"        => "update-subcategory",
    ]);
    Route::get("/delete-subcategory/{id}", [
        "uses"      => "App\Http\Controllers\Admin\SubCategoryController@deleteSubCategory",
        "as"        => "delete-subcategory",
    ]);

    // brand cotroller
    Route::get("/add-brand", [
        "uses"      => "App\Http\Controllers\Admin\BrandController@addbrand",
        "as"        => "add-brand",
    ]);
    Route::post("/new-brand", [
        "uses"      => "App\Http\Controllers\Admin\BrandController@newBrand",
        "as"        => "new-brand",
    ]);

    // Unit controller
    Route::get("/add-unit", [
        "uses"      => "App\Http\Controllers\Admin\UnitController@unitAdd",
        "as"        => "add-unit",
    ]);
    Route::post("/new-unit", [
        "uses"      => "App\Http\Controllers\Admin\UnitController@newUnit",
        "as"        => "new-unit",
    ]);

    // Product rout
    Route::get("/add-product", [
        "uses"      => "App\Http\Controllers\Admin\ProductController@addProduct",
        "as"        => "add-product",
    ]);
    Route::post("/new-product", [
        "uses"      => "App\Http\Controllers\Admin\ProductController@newProduct",
        "as"        => "new-product",
    ]);
    Route::get("/get-sub-category-by-category-id/{id}", [
        "uses"      => "App\Http\Controllers\Admin\ProductController@getSubCategoryId",
        "as"        => "get-sub-category-by-category-id"
    ]);



});

