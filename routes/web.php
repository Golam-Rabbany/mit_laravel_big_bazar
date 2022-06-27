<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/frontpage', FrontendController::class);
Route::get('/beets/frontpage',[FrontendController::class, 'beets'])->name('frontend.beets');


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






//demo



require __DIR__.'/auth.php';

