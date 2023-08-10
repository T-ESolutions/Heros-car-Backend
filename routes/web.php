<?php

use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\CancelReasonsController;
use App\Http\Controllers\Admin\CarCategoryController;
use App\Http\Controllers\Admin\ModellController;
use App\Http\Controllers\Admin\ScreensController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\StatusController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrdersController;

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

Route::get('/', function () {
    return redirect()->route('admin.login_view');
});

Route::group([
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers'
], function () {

    Route::group(['namespace' => 'Admin', 'as' => 'admin'], function () {
        Route::get('login', 'AuthController@login_view')->name('.login_view');
        Route::post('login', 'AuthController@login')->name('.login');
        Route::get('logout', 'AuthController@logout')->name('.logout');
    });
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('home', [HomeController::class, 'index'])->name('home');


        Route::group(['namespace' => 'Admin', 'as' => 'admin'], function () {
            Route::group(['prefix' => 'screens', 'as' => '.screens'], function () {
                Route::get('/', [ScreensController::class, 'index']);
                Route::get('getData', [ScreensController::class, 'getData'])->name('.datatable');
                Route::get('/create', [ScreensController::class, 'create'])->name('.create');
                Route::post('/store', [ScreensController::class, 'store'])->name('.store');
                Route::get('/edit/{id}', [ScreensController::class, 'edit'])->name('.edit');
                Route::post('/update', [ScreensController::class, 'update'])->name('.update');
                Route::get('/show/{id}', [ScreensController::class, 'show'])->name('.show');
                Route::post('/delete', [ScreensController::class, 'delete'])->name('.delete');
                Route::post('/delete-multi', [ScreensController::class, 'deleteMulti'])->name('.deleteMulti');
            });


            Route::group(['prefix' => 'services', 'as' => '.services'], function () {
                Route::get('/', [ServicesController::class, 'index']);
                Route::get('getData', [ServicesController::class, 'getData'])->name('.datatable');
                Route::get('/create', [ServicesController::class, 'create'])->name('.create');
                Route::post('/store', [ServicesController::class, 'store'])->name('.store');
                Route::get('/edit/{id}', [ServicesController::class, 'edit'])->name('.edit');
                Route::post('/update', [ServicesController::class, 'update'])->name('.update');
                Route::get('/show/{id}', [ServicesController::class, 'show'])->name('.show');
                Route::post('/delete', [ServicesController::class, 'delete'])->name('.delete');
                Route::post('/delete-multi', [ServicesController::class, 'deleteMulti'])->name('.deleteMulti');
            });

            Route::group(['prefix' => 'brands', 'as' => '.brands'], function () {
                Route::get('/', [BrandsController::class, 'index']);
                Route::get('getData', [BrandsController::class, 'getData'])->name('.datatable');
                Route::get('/create', [BrandsController::class, 'create'])->name('.create');
                Route::post('/store', [BrandsController::class, 'store'])->name('.store');
                Route::get('/edit/{id}', [BrandsController::class, 'edit'])->name('.edit');
                Route::post('/update', [BrandsController::class, 'update'])->name('.update');
                Route::get('/show/{id}', [BrandsController::class, 'show'])->name('.show');
                Route::post('/delete', [BrandsController::class, 'delete'])->name('.delete');
                Route::post('/delete-multi', [BrandsController::class, 'deleteMulti'])->name('.deleteMulti');
            });

            Route::group(['prefix' => 'modells', 'as' => '.modells'], function () {
                Route::get('/', [ModellController::class, 'index']);
                Route::get('getData', [ModellController::class, 'getData'])->name('.datatable');
                Route::get('/create', [ModellController::class, 'create'])->name('.create');
                Route::post('/store', [ModellController::class, 'store'])->name('.store');
                Route::get('/edit/{id}', [ModellController::class, 'edit'])->name('.edit');
                Route::post('/update', [ModellController::class, 'update'])->name('.update');
                Route::get('/show/{id}', [ModellController::class, 'show'])->name('.show');
                Route::post('/delete', [ModellController::class, 'delete'])->name('.delete');
                Route::post('/delete-multi', [ModellController::class, 'deleteMulti'])->name('.deleteMulti');
            });

            Route::group(['prefix' => 'admins', 'as' => '.admins'], function () {
                Route::get('/', 'AdminController@index');
                Route::get('getData', 'AdminController@getData')->name('.datatable');
                Route::get('/create', 'AdminController@create')->name('.create');
                Route::post('/store', 'AdminController@store')->name('.store');
                Route::get('/edit/{id}', 'AdminController@edit')->name('.edit');
                Route::post('/update', 'AdminController@update')->name('.update');
                Route::get('/show/{id}', 'AdminController@show')->name('.show');
                Route::post('/delete', 'AdminController@delete')->name('.delete');
                Route::post('/delete-multi', 'AdminController@deleteMulti')->name('.deleteMulti');
            });

            Route::group(['prefix' => 'users', 'as' => '.users'], function () {
                Route::get('/', 'UserController@index');
                Route::get('/profile', 'ProfileController@profile')->name('.profile');
                Route::get('getData', 'UserController@getData')->name('.datatable');
                Route::get('/create', 'UserController@create')->name('.create');
                Route::post('/store', 'UserController@store')->name('.store');
                Route::get('/edit/{id}', 'UserController@edit')->name('.edit');
                Route::post('/update', 'UserController@update')->name('.update');
                Route::get('/show/{id}', 'UserController@show')->name('.show');
                Route::post('/delete', 'UserController@delete')->name('.delete');
                Route::post('/delete-multi', 'UserController@deleteMulti')->name('.deleteMulti');
                Route::get('/orders/{id}', 'UserController@userOrders')->name('.orders');
                Route::get('/getUserOrdersData/{id}', 'UserController@getUserOrdersData')->name('.ordersDatatable');
                Route::get('/cancel-requests/{id}', 'UserController@userCancelRequests')->name('.cancelRequests');
                Route::get('/getUserCancelRequestsData/{id}', 'UserController@getUserCancelRequestsData')
                    ->name('.CancelRequestsDatatable');
            });

            Route::group(['prefix' => 'providers', 'as' => '.providers'], function () {
                Route::get('/', 'ProviderController@index');
                Route::get('/profile', 'ProfileController@profile')->name('.profile');
                Route::get('getData', 'ProviderController@getData')->name('.datatable');
                Route::get('/create', 'ProviderController@create')->name('.create');
                Route::post('/store', 'ProviderController@store')->name('.store');
                Route::get('/edit/{id}', 'ProviderController@edit')->name('.edit');
                Route::post('/update', 'ProviderController@update')->name('.update');
                Route::get('/show/{id}', 'ProviderController@show')->name('.show');
                Route::post('/delete', 'ProviderController@delete')->name('.delete');
                Route::post('/delete-multi', 'ProviderController@deleteMulti')->name('.deleteMulti');
                Route::get('/orders/{id}', 'ProviderController@userOrders')->name('.orders');
                Route::get('/getUserOrdersData/{id}', 'ProviderController@getUserOrdersData')->name('.ordersDatatable');
                Route::get('/cancel-requests/{id}', 'ProviderController@userCancelRequests')->name('.cancelRequests');
                Route::get('/getUserCancelRequestsData/{id}', 'ProviderController@getUserCancelRequestsData')
                    ->name('.CancelRequestsDatatable');
            });


            Route::group(['prefix' => 'orders', 'as' => '.orders'], function () {
                Route::get('/', [OrdersController::class, 'index'])->name('.index');
                Route::get('getData', [OrdersController::class, 'getData'])->name('.datatable');
                Route::post('/update', [OrdersController::class, 'update'])->name('.update');
                Route::get('/details/{id}', [OrdersController::class, 'details'])->name('.details');
                Route::post('/delete', [OrdersController::class, 'delete'])->name('.delete');
                Route::post('/delete-multi', [OrdersController::class, 'deleteMulti'])->name('.deleteMulti');
            });

            Route::group(['prefix' => 'notifications', 'as' => '.notifications'], function () {
                Route::get('/create', 'NotificationController@create')->name('.create');
                Route::post('/store', 'NotificationController@store')->name('.store');

            });


            Route::group(['prefix' => 'car-categories', 'as' => '.car-categories'], function () {
                Route::get('/', [CarCategoryController::class, 'index']);
                Route::get('getData', [CarCategoryController::class, 'getData'])->name('.datatable');
                Route::get('/create', [CarCategoryController::class, 'create'])->name('.create');
                Route::post('/store', [CarCategoryController::class, 'store'])->name('.store');
                Route::get('/edit/{id}', [CarCategoryController::class, 'edit'])->name('.edit');
                Route::post('/update', [CarCategoryController::class, 'update'])->name('.update');
                Route::get('/show/{id}', [CarCategoryController::class, 'show'])->name('.show');
                Route::post('/delete', [CarCategoryController::class, 'delete'])->name('.delete');
                Route::post('/delete-multi', [CarCategoryController::class, 'deleteMulti'])->name('.deleteMulti');
            });

            Route::group(['prefix' => 'status', 'as' => '.status'], function () {
                Route::get('/', [StatusController::class, 'index']);
                Route::get('getData', [StatusController::class, 'getData'])->name('.datatable');
                Route::get('/create', [StatusController::class, 'create'])->name('.create');
                Route::post('/store', [StatusController::class, 'store'])->name('.store');
                Route::get('/edit/{id}', [StatusController::class, 'edit'])->name('.edit');
                Route::post('/update', [StatusController::class, 'update'])->name('.update');
                Route::get('/show/{id}', [StatusController::class, 'show'])->name('.show');
                Route::post('/delete', [StatusController::class, 'delete'])->name('.delete');
                Route::post('/delete-multi', [StatusController::class, 'deleteMulti'])->name('.deleteMulti');
            });

            Route::group(['prefix' => 'cancel-reasons', 'as' => '.cancel-reasons'], function () {
                Route::get('/', [CancelReasonsController::class, 'index']);
                Route::get('getData', [CancelReasonsController::class, 'getData'])->name('.datatable');
                Route::get('/create', [CancelReasonsController::class, 'create'])->name('.create');
                Route::post('/store', [CancelReasonsController::class, 'store'])->name('.store');
                Route::get('/edit/{id}', [CancelReasonsController::class, 'edit'])->name('.edit');
                Route::post('/update', [CancelReasonsController::class, 'update'])->name('.update');
                Route::get('/show/{id}', [CancelReasonsController::class, 'show'])->name('.show');
                Route::post('/delete', [CancelReasonsController::class, 'delete'])->name('.delete');
                Route::post('/delete-multi', [CancelReasonsController::class, 'deleteMulti'])->name('.deleteMulti');
            });


            Route::group(['prefix' => 'service-car-categories', 'as' => '.service-car-categories'], function () {
                Route::get('/', [ServiceCategoryController::class, 'index']);
                Route::get('getData', [ServiceCategoryController::class, 'getData'])->name('.datatable');
                Route::get('/create', [ServiceCategoryController::class, 'create'])->name('.create');
                Route::post('/store', [ServiceCategoryController::class, 'store'])->name('.store');
                Route::get('/edit/{id}', [ServiceCategoryController::class, 'edit'])->name('.edit');
                Route::post('/update', [ServiceCategoryController::class, 'update'])->name('.update');
                Route::get('/show/{id}', [ServiceCategoryController::class, 'show'])->name('.show');
                Route::post('/delete', [ServiceCategoryController::class, 'delete'])->name('.delete');
                Route::post('/delete-multi', [ServiceCategoryController::class, 'deleteMulti'])->name('.deleteMulti');
                //ajax
                Route::get('/get/modell-data', [ServiceCategoryController::class, 'modellData'])
                    ->name('.getmodellData');
                Route::get('/get/year-data', [ServiceCategoryController::class, 'yearData'])
                    ->name('.getYearData');
            });


        });
    });
});
