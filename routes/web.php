<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\checkoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;

use App\Http\Controllers\StripeController;




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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontController::class, 'index'] );
Route::get('categorys', [FrontController::class, 'category'] );
Route::get('categorys/{slug}', [FrontController::class, 'viewcategory'] );
Route::get('categorys/{cate_slug}/{prod_slug}', [FrontController::class, 'productview']);

Route::get('product-list', [FrontController::class,'productlistAjax']);
Route::post('searchproduct', [FrontController::class,'searchProduct']);


Route::post('checkout',[checkoutController::class , 'stripePost'])->name('stripe.post');

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::post('by-derict',[checkoutController::class,'byderict']);

    Route::post('by-now',[checkoutController::class,'ByNow']);

    Route::get('cart',[CartController::class,'viewcart']);
    Route::get('checkout',[checkoutController::class,'index']);
    Route::post('placett',[checkoutController::class,'placeorder' ]);
   ;
    Route::get('my-orders',[UserController::class,'index']);
    Route::get('view-order/{id}',[UserController::class,'view']);


    Route::post('add-rating', [RatingController::class,'add']);

    Route::get('add-review/{product_slug}/userreview', [ReviewController::class,'add']);
    Route::post('add-review', [ReviewController::class,'create']);
    Route::get('edit-review/{product_slug}/userreview', [ReviewController::class,'edit']);
    Route::put('update-review',[ReviewController::class,'update']);
    


    Route::get('wishlist' , [WishlistController::class, 'index']);  

    Route::post('procead-to-pay',[CheckoutController::class, 'stripe']);

});

Route::post('add-to-wishlist' , [WishlistController::class, 'add']);
Route::post('delete-wishlist-item' , [WishlistController::class, 'deleteitem']);



Route::post('add-to-cart',[CartController::class,'addProduct']);
Route::post('delete-cart-item',[CartController::class,'deleteproduct']);
Route::post('update-cart',[CartController::class,'updatecart']);


Route::get('load-cart-data',[CartController::class,'cartcount']);
Route::get('load-wishlist-count',[WishlistController::class,'wishlistcount']);




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','isAdmin'])->group(function () {

    Route::get('/dashboard', [FrontendController::class, 'index'] );
    Route::get('category', [CategoryController::class, 'index'] );
    Route::get('add-category', [CategoryController::class, 'add'] );
    Route::post('insert-category', [CategoryController::class, 'insert'] );
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy'] );
    Route::resource('category', CategoryController::class );

    Route::get('products', [ProductController::class, 'index'] );
    Route::post('insert-products', [ProductController::class, 'insert'] );
    Route::get('add-products', [ProductController::class, 'add'] );
    Route::get('delete-products/{id}', [ProductController::class, 'destroy'] );
    Route::resource('product', ProductController::class);

    
    Route::get('orders', [OrderController::class, 'index'] );
    Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
    Route::put('update-order/{id}',  [OrderController::class, 'updateorder'] );
    Route::get('order-history', [OrderController::class, 'orderhistory'] );

    Route::get('users', [DashboardController::class, 'users'] );
    Route::get('view-user/{id}', [DashboardController::class, 'viewuser'] );
    

});

