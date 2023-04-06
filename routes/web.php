<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PhpParser\Builder\Function_;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware('verified')->group(function () {
    Route::get('whishlist', [App\http\Controllers\Frontend\WhishlistController::class, 'index'])->name('whishlist');
    Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'index'])->name('cart');
    Route::get('checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index'])->name('checkout');

    Route::controller(App\Http\Controllers\Frontend\OrderController::class)->group(function () {
        Route::get('order', 'index')->name('order');
        Route::get('orders/{orderId}',  'show')->name('show-order');
        Route::get('orders/{orderId}/generate',  'generateInvoice')->name('generateInvoice');
    });

    Route::controller(App\Http\Controllers\Frontend\UserController::class)->group(function () {
        Route::get('profile', 'index')->name('profile');
        Route::post('profile', 'updateUserDetail');
        Route::get('change-password', 'passwordCreate')->name('create-password');
        Route::post('change-password', 'changePassword')->name('change-password');
    });
});

Route::controller(App\http\Controllers\Frontend\FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('trending');
    Route::get('categories', 'categories')->name('collection');
    Route::get('categories/{category_slug}', 'products');
    Route::get('categories/{category_slug}/{product_slug}', 'productView');
    Route::get('thank-you', 'thankyou');
    Route::get('new-arrivals', 'newArrival')->name('arrival');
    Route::get('featured-produucts', 'featuredProduct')->name('featured');
    Route::get('search', 'searchProduct')->name('search');
});

Auth::routes(['verify' => true]);

Route::prefix('admin')->middleware(['verified', 'isAdmin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    // route category
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('category', 'index')->name('categories');
        Route::get('category/create', 'create')->name('create-category');
        Route::post('category', 'store');
        Route::get('category/{category}/edit', 'edit');
        Route::put('category/{category}', 'update');
        Route::delete('category/{category:slug}', 'destroy');
        Route::get('category/{category:slug}', 'show');
    });
    // route brand
    Route::controller(App\Http\Controllers\Admin\BrandController::class)->group(function () {
        Route::get('brands', 'index')->name('brands');
        Route::post('brand', 'store')->name('create-brand');
        Route::match(['get', 'post'], 'brand/edit/{id}', 'edit');
        Route::delete('delete-brand/{id}', 'delete');
    });
    // route Product
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('products', 'index')->name('products');
        Route::get('products/create', 'create')->name('create-product');
        Route::post('products', 'store')->name('save-product');
        Route::get('products/{product}/edit', 'edit')->name('edit-product');
        Route::put('products/{product}', 'update')->name('update-product');
        Route::get('product-image/{product_image_id}/delete', 'destroyImage');
        Route::get('product/{product_id}/delete', 'destroy');

        Route::post('product-color/{prod_color_id}', 'updateProductColorQty');
        Route::get('product-color/{prod_color_id}', 'deleteProdColor');
    });
    // Route Color
    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('colors', 'index')->name('colors');
        Route::get('color/create', 'create')->name('create-color');
        Route::post('colors', 'store')->name('save-color');
        Route::get('/colors/{color}/edit', 'edit');
        Route::put('colors/{color}', 'update')->name('update-color');
        Route::get('delete-color/{color}', 'destroy');
    });
    // Route Color
    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('sliders', 'index')->name('sliders');
        Route::get('slider/create', 'create')->name('create-slider');
        Route::post('sliders', 'store')->name('save-slider');
        Route::get('slider/{slider}/edit', 'edit');
        Route::put('sliders/{slider}', 'update')->name('update-slider');
        Route::get('delete-slider/{slider}', 'destroy');
    });
    // Route Admin Orders
    Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function () {
        Route::get('orders', 'index');
        Route::get('orders/{orderId}', 'show');
        Route::patch('orders/{orderId}', 'update');
        Route::get('invoice/{orderId}', 'viewInvoice');
        Route::get('invoice/{orderId}/generate', 'generateInvoice');
        Route::get('invoice/{orderId}/mail', 'mailInvoice');
    });
    Route::controller(App\Http\Controllers\Admin\SettingController::class)->group(function () {
        Route::get('site-setting', 'index')->name('setting');
        Route::post('settings', 'store')->name('create-setting');
    });
    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
        Route::get('users', 'index')->name('user');
        Route::get('user-admin', 'showAdmin')->name('admin');
        Route::get('users/create', 'create')->name('create-user');
        Route::post('users', 'store')->name('users');
        Route::get('users/{user_Id}/edit', 'edit');
        Route::patch('users/{user_Id}', 'update');
        Route::get('users/{user_id}/delete', 'destroy');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
