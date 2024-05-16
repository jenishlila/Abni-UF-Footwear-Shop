<?php

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

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Admin Middleware prefix
Route::get('admin/login','Auth\LoginController@showLoginForm')->name('admin.login');

Route::group(['middleware' => ['auth','admin:1']], function () {
    // Admin Prefixx
Route::group(['prefix' => 'admin'], function () {
    Route::get('admin/login','Auth\LoginController@login');
Route::get('/logout', function () {
    return view('layout/admin/auth/logout');
});
Route::get('/dashboard', function () {
        return view('layout/admin/home');});
    
Route::get('/userdata','ShowOrderController@UserData');
Route::get('/users/changestatususer','ShowOrderController@ChangeStatusUser');


//color
Route::get('/color', function () {
    return view('layout/admin/color/colors');
});
Route::post('/color','ColorController@insert'); 
Route::get('/color','ColorController@show');

//size
Route::post('/size','SizeController@insert');
Route::get('/size','SizeController@show');


//category
Route::get('/category', function () {
    return view('layout/admin/category/categories');
});
Route::get('/category','CategoryController@show');
Route::post('/category','CategoryController@insert');
//product
Route::post('/product','ProductController@insert'); 
Route::get('/product','ProductController@show');

});

//Color Prefix
Route::group(['prefix' => 'admin/color'], function () {
Route::get('/add', function () {
        return view('layout/admin/color/add');});
Route::get('edit/{id}','ColorController@Edit');
Route::post('/update','ColorController@update'); 
Route::get('/delete/{id}','ColorController@Delete');
Route::get('/trash','ColorController@trash');
Route::get('/restore/{id}','ColorController@restore');
Route::get('/destroy/{id}','ColorController@destroy');
Route::get('/AdduniqueColor','ColorController@AddUniqueColor');
Route::get('/changestatus','ColorController@ChangeStatus');
});
//End Color Prefix
//size prefix
Route::group(['prefix' => 'admin/size'], function () {
    Route::get('/add', function () {
            return view('layout/admin/size/add');});

    Route::get('edit/{id}','SizeController@Edit');
    Route::post('/update','SizeController@update'); 
    Route::get('/delete/{id}','SizeController@Delete');
    Route::get('/trash','SizeController@trash');
    Route::get('/restore/{id}','SizeController@restore');
    Route::get('/destroy/{id}','SizeController@destroy');
    Route::get('/AdduniqueSize','SizeController@AddUniqueSize');
    Route::get('/changestatus','SizeController@ChangeStatus');
    });
//end size prefix
// Category Prefix
Route::group(['prefix' => 'admin/category'], function () {
    Route::get('/add', function () {
        return view('layout/admin/category/add');});
Route::get('edit/{id}','CategoryController@Edit');
Route::post('/update','CategoryController@update'); 
Route::get('/delete/{id}','CategoryController@Delete');
Route::get('/trash','CategoryController@trash');
Route::get('/restore/{id}','CategoryController@restore');
Route::get('/destroy/{id}','CategoryController@destroy');
Route::get('/uniqueCategory','CategoryController@AddUniqueCategory');
Route::get('/changeCategoryStatus','CategoryController@ChangeStatus');
});

Route::group(['prefix' => 'admin/product'], function () {
    Route::get('/add','ProductController@index');
    Route::get('edit/{id}','ProductController@Edit');
    Route::post('update','ProductController@update');
    Route::get('delete/{id}','ProductController@Delete');
    Route::get('AdduniqueProduct','ProductController@AddUniqueProduct');
    Route::get('changestatus','ProductController@ChangeStatus');
    Route::get('trash','ProductController@trash');
    Route::get('restore/{id}','ProductController@restore');
    Route::get('destroy/{id}','ProductController@destroy');
    Route::get('AdduniqueAccessUrl','ProductController@AddUniqueAccessUrl');
});
    Route::get('admin/showorder','ShowOrderController@index');
    Route::get('admin/orderdetail/{id}','ShowOrderController@detail');
    Route::get('admin/order/orderstatus','ShowOrderController@ChangeStatus');


});
// End Admin Middleware prefix

Auth::routes();
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');
Route::get('/login', function () {
    return view('layout/front/auth/login');
});
Route::get('/forgot', function () {
    return view('layout/front/auth/reset');
});
Route::post('reset','Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('forgot/{token}','Auth\ResetPasswordController@showResetForm');
// user
 Route::post('register','Auth\RegisterController@register');

//  Route::get('register','Auth\RegisterController@showRegistrationForm');

Route::get('/home','HomeController@Index');
Route::get('/','HomeController@Index');
Route::get('abani/myorder','HomeController@MyOrder');

Route::get('abani/Adduniqueemail','Auth\RegisterController@UniqueEmail');


Route::get('/cart', function () {
    return view('layout/front/product/cart');
});
//Show Product
Route::get('product/list', function () {
    return view('layout/front/product/show');
});
Route::get('product/detail', function () {
    return view('layout/front/product/detail');
});
Route::get('products','IndexController@ShowProductList');
Route::get('/{access_url}','IndexController@DetailPage');
Route::get('product/sort','IndexController@Sort');
Route::get('product/addtocart','CartController@add');
Route::get('product/cart','CartController@index');
Route::get('cart/update','CartController@UpdateCart');
Route::get('product/showcartdetail','CartController@ShowCartDetail');
//checkout
Route::group(['middleware' => ['auth','admin:0']], function () 
{
    route::get('product/checkout','CartController@Checkout');
    route::get('product/address','AddressController@index');
    route::post('product/store','AddressController@Store');
    route::post('product/shippingstore','AddressController@ShippingStore');
    route::get('product/billingupdate/{id}','AddressController@BillingUpdate');
    route::post('product/billupdatesave','AddressController@BillingUpdateSave');
    route::get('product/showorderreview','AddressController@ShowOrderReview');
    route::get('product/shippingupdate/{id}','AddressController@ShippingUpdate');
    route::post('product/shipupdatesave','AddressController@ShippingUpdateSave');
    route::get('product/placeorder','AddressController@PlaceOrder');
    route::get('product/shipindex','AddressController@ShippingIndex');


});









