<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DemoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GroceryController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DemoproductController;
use App\Http\Controllers\OrderController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('welcome');
});



//cat product
Route::get('product-show/{id}', [FrontendController::class, 'allproduct'])->name('product.allproduct');
Route::get('show/product/{id}', [FrontendController::class, 'productshow'])->name('show.product');
//demo cat product
Route::get('demo/product/{id}', [FrontendController::class, 'catProduct'])->name('demo.product');

// Route::get('product/details/{id}', [ProductController::class, 'productDetails'])->name('productDetails');

//single product
Route::get('product/single/{sku}', [FrontendController::class, 'productDetails'])->name('singleProduct');
Route::get('product/details/{id}', [FrontendController::class, 'productDetailsView'])->name('product.details');
Route::get('singleGrocery/{slug}', [FrontendController::class, 'groceryProduct'])->name('singleGrocery');

Route::get('/productPage', function () {
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth'])->group(function(){
   

    Route::resource('/banner', BannerController::class);
    
    Route::resource('/category', CategoryController::class);
    
    Route::resource('/product', ProductController::class);
   
   
    
    Route::resource('/store', StoreController::class);
    
    Route::resource('/grocery', GroceryController::class);
    
    Route::resource('/logo', LogoController::class);
    
    Route::resource('/header', HeaderController::class);
    
    Route::resource('/subscribe', SubscribeController::class);

    Route::resource('/profile', ProfileController::class);
    Route::post('/profile_photo', [ProfileController::class, 'profile_photo'])->name('profile.photo');
    Route::post('/profile/changepassword', [ProfileController::class, 'chng_password'])->name('profile.chng_password');

    Route::resource('/demo', DemoController::class);

    Route::resource('/demoproduct', DemoproductController::class);

    
});



//add to cart
Route::post('cart/add', [CartController::class, 'store'])->name('cart.add');

Route::get('cart/show', [CartController::class, 'show'])->name('cart.show');

// cart
Route::resource('cart',CartController::class);
Route::post('/updatecart', [CartController::class, 'updatecart'])->name('updatecart');

//checkout
Route::get('checkout', [OrderController::class, 'checkout'])->name('checkout');

//order
Route::resource('/order', OrderController::class);
Route::post('order/details', [OrderController::class, 'orderdetails'])->name('order.details');






require __DIR__.'/auth.php';

