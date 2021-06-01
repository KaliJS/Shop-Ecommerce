<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SingleProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\PostSubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\TransactionsController;

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

//     If(Auth::check())
//         {
//             return redirect('/login');
//         }else{
//             return redirect('/login');
//         }
// });

// Route::get('/',function () {
//     return view('shopping.index');
// });

Auth::routes();


//Route::resource('/login', LoginController::class);

Route::resource('/register', RegisterController::class);

Route::get('/', [HomeController::class, 'index']);
Route::get('/category', [ShopController::class, 'getAllCategories']);
Route::get('/category/{data}', [ShopController::class, 'getCategoryProducts']);
Route::get('/shop', [ShopController::class, 'index']);

Route::get('/product/{data}', [SingleProductController::class, 'getProductDetails']);

Route::post('/product/updateCart', [CartController::class, 'updateCart']);

Route::post('/cart/updateCart', [CartController::class, 'updateCart']);
Route::post('/cart/applyCoupon', [CartController::class, 'applyCoupon']);
Route::get('/cart', [CartController::class, 'index']);


Route::get('/order/success', [CheckoutController::class, 'successOrder']);


Route::get('/order/getDeliveryBoy/{id}',[OrdersController::class,'getDeliveryBoy']);
Route::get('/order/getAllOrderItems/{id}',[OrdersController::class,'getAllOrderItems']);
        
Route::get('/order-list', [OrdersController::class, 'getAllOrders']);

Route::post('/checkout/placeOrder', [CheckoutController::class, 'placeOrder']);
Route::post('/checkout/checkSelectedDate', [CheckoutController::class, 'checkSelectedDate']);
Route::post('/checkout/checkSelectedTime', [CheckoutController::class, 'checkSelectedTime']);
Route::post('/checkout/placeCashOrder', [CheckoutController::class, 'placeCashOrder']);
Route::resource('/checkout', CheckoutController::class);

Route::group(['middleware' => ['web','auth','role']], function (){

    Route::prefix('admin')->group(function () {

        /********************Dashboard Starts********************/
        Route::get('/dashboard/completed_orders',[DashboardController::class,'completed_orders']);
        Route::get('/dashboard/remaining_orders',[DashboardController::class,'remaining_orders']);
        
        Route::resource('/dashboard', DashboardController::class);
        /********************Dashboard Ends**********************/


        /********************Categories Starts********************/
        Route::resource('/categories', CategoryController::class);
        /********************Categories Ends**********************/

        /********************Categories Starts********************/
        Route::resource('/sub-categories', SubCategoryController::class);
        /********************Categories Ends**********************/

        /********************Categories Starts********************/
        Route::resource('/post-sub-categories', PostSubCategoryController::class);
        /********************Categories Ends**********************/


        /********************Products Starts********************/
        Route::post('/products/getDeleteSelectedImages', [ProductController::class,'getDeleteSelectedImages']);
        Route::post('/products/getCategoryData', [ProductController::class,'getCategoryData']);
        Route::post('/products/getSubCategoryData', [ProductController::class,'getSubCategoryData']);
        Route::resource('/products', ProductController::class);
        /********************Products Ends**********************/


        /********************Users Starts********************/
        Route::resource('/users', UserController::class);
        /********************Users Ends**********************/


        /********************Roles Starts********************/
        Route::resource('/roles', RoleController::class);
        /********************Roles Ends**********************/


        /********************Promo Code Starts********************/
        Route::resource('/promo', PromoController::class);
        /********************Promo Code Ends**********************/


         /********************Orders Code Starts********************/
        Route::get('/order/getOrderItems/{id}',[OrdersController::class,'getOrderItems']);
        Route::get('/order/getTransaction/{id}',[OrdersController::class,'getTransaction']);
        Route::post('/order/assignDeliveryBoy/{id}',[OrdersController::class,'assignDeliveryBoy']);
        Route::post('/order/changeOrderStatus/{id}',[OrdersController::class,'changeOrderStatus']);
        Route::get('/order/getOrderStatus/{id}',[OrdersController::class,'getOrderStatus']);
        Route::get('/order/getPaymentStatus/{id}',[OrdersController::class,'getPaymentStatus']);
        Route::post('/order/changePaymentStatus/{id}',[OrdersController::class,'changePaymentStatus']);
        Route::resource('/orders', OrdersController::class);
        /********************Orders Code Ends********************/


        /********************Transactions Code Starts********************/
        Route::resource('/transactions', TransactionsController::class);
        /********************Transactions Code Ends*********************/

    });

});

	