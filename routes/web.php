<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\LoginController;

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

//Route::get('/', function () {});

Route::get('/',[FrontEndController::class,'frontPage']);
Route::get('footer-cate/{id}',[FrontEndController::class,'searchCategory']);
Route::get('categories/{id}',[FrontEndController::class,'searchCategory']);
Route::get('view-single-product/{id}',[FrontEndController::class,'singleFromMultiProduct']);
Route::get('single-product-from-cate/{id}',[FrontEndController::class,'singleProductFromCate']);
Route::get('single-from-multiple-product/{id}',[App\Http\Controllers\FrontEndController::class,'singleFromMultiProduct']);
Route::get('/search-product-list',[FrontEndController::class,'searchProduct']);
Route::post('/submit-search',[FrontEndController::class,'submitSearch']);
Route::get('view-searched-product/{id}',[FrontEndController::class,'viewSearchedProduct']);
Route::post('/add-to-cart-from-cate-search',[CartController::class,'addToCartFromCateSearch']);
Route::get('add-to-cart/{id}',[CartController::class,'addToCart']);
Route::get('/load-cart-item',[CartController::class,'loadCart']);
Route::get('/proceed-to-checkout',[CartController::class,'viewCart']);
Route::get('/view-cart',[CartController::class,'viewCart']);
Route::post('/update-cart',[CartController::class,'updateCart']);
Route::post('/delete_cart_item',[CartController::class,'deleteCartItem']);
Route::get('/checkout',[CheckOutController::class,'viewCheckout']);
Route::post('/place-order',[CheckOutController::class,'placeOrder']);
Route::get('/your-orders',[CheckOutController::class,'yourOrders']);
Route::get('/terms-and-cndition',[App\Http\Controllers\FrontEndController::class,'TermsAndCondition']);
Route::get('/privacy-policy',[App\Http\Controllers\FrontEndController::class,'PrivacyPolicy']);
Route::get('/return-policy',[App\Http\Controllers\FrontEndController::class,'returnPolicy']);
Route::get('/about-us',[App\Http\Controllers\FrontEndController::class,'aboutUs']);
Route::get('/return-request','App\Http\Controllers\FrontEndController@returnRequest');
Route::put('/send-return-request',[App\Http\Controllers\FrontEndController::class,'submitReturnRequest']);

//Admin Login routes...................................................................................................................
Route::group(['middleware'=>'alreadyLoggedIn'],function(){ 
    Route::get('/admin/login',[LoginController::class,'LoginPage']);
});    
Route::post('admin/login',[LoginController::class,'adminLogin'])->name('admin.login');
// BackEnd routes........................................................................................................................
Route::group(['middleware'=>'isLoggedIn'],function(){
Route::get('admin/logout',[LoginController::class,'adminLogout'])->name('admin.logout');    
Route::get('/admin-dashboard',[BackendController::class,'dashboard']);

//Products Routes........................................................................................................................
Route::get('/product-lists',[BackendController::class,'productsList']);
Route::get('/category-list',[BackendController::class,'categoryList']);
Route::post('/add-product',[BackendController::class,'addProduct']);
Route::get('edit-product/{id}',[BackendController::class,'editProduct']);
Route::put('update-product/{id}',[BackendController::class,'updateProduct']);
Route::delete('delete/{id}',[BackendController::class,'deleteProduct']);

//Category Routes........................................................................................................................
Route::post('add-new-category',[BackendController::class,'addCategory']);
Route::get('edit_category/{id}',[BackendController::class,'editCategory']);
Route::put('update-category',[BackendController::class,'updateCategory']);
Route::get('edit_category-delete/{id}',[BackendController::class,'editCateDelete']);
Route::put('delete-category',[BackendController::class,'deleteCategory']);

Route::get('/orders-list',[BackendController::class,'orderList']);
Route::get('view-single-order/{id}',[BackendController::class,'viewSingleOrder']);
Route::get('edit_order/{id}',[BackendController::class,'editOrder']);
Route::put('update-order',[BackendController::class,'updateOrder']);
Route::get('generate-pdf/{id}',[App\Http\Controllers\BackendController::class,'generatePDF']);
});




