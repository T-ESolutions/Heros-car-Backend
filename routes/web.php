<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ZoneController;
use App\Http\Controllers\Admin\NotificationSettingController;
use Illuminate\Support\Facades\Artisan;

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
//    return view('welcome');
    return redirect()->route('admin.login');
//    return redirect()->route('home');
});


Route::get('cache', function () {
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize');
    return 'success';
});


Route::group([
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers'
], function () {

    Route::group(['middleware' => 'auth:admin','namespace' => 'Admin'], function () {
        Route::get('home', 'HomeController@index')->name('home');
        Route::post('home', 'HomeController@index')->name('homeWzSearch');
        Route::get('home-meals/{date}', 'HomeController@getData')->name('homeMealsDatatables');
    });

    Route::group(['namespace' => 'Admin', 'as' => 'admin'], function () {
        Route::get('login', 'AuthController@login_view')->name('login-view');
        Route::post('login', 'AuthController@login')->name('.login');
        Route::get('logout', 'AuthController@logout')->name('.logout');

        Route::group(['middleware' => 'auth:admin'], function () {

            Route::group(['prefix' => 'reports', 'as' => '.reports'], function () {
                Route::get('reports', 'ReportController@index');
                Route::post('reports', 'ReportController@index')->name('.reportsWzSearch');
                Route::get('reports-meals/{date}', 'ReportController@getData')->name('.reportsMealsDatatables');
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

            Route::group(['prefix' => 'orders', 'as' => '.orders'], function () {
                Route::get('/{status}', 'OrderController@index');
                Route::get('getData/{status}', 'OrderController@getData')->name('.datatable');
                Route::get('/create', 'OrderController@create')->name('.create');
                Route::post('/store', 'OrderController@store')->name('.store');
                Route::get('/edit/{id}', 'OrderController@edit')->name('.edit');
                Route::post('/update', 'OrderController@update')->name('.update');
                Route::get('/show/{id}', 'OrderController@show')->name('.show');
                Route::post('/delete', 'OrderController@delete')->name('.delete');
                Route::post('/delete-multi', 'OrderController@deleteMulti')->name('.deleteMulti');
                Route::get('/order-details/{order_id}', 'OrderController@orderDetails')->name('.orderDetailsDatatable');
                Route::post('/change-order-meal-status', 'OrderController@changeOrderMealStatus')->name('.changeOrderMealStatus');
                Route::post('/change-order-meal', 'OrderController@changeOrderMeal')->name('.changeOrderMeal');

            });

            Route::group(['prefix' => 'cancel_requests', 'as' => '.cancel_requests'], function () {
                Route::get('/', 'CancelRequestController@index');
                Route::get('getData', 'CancelRequestController@getData')->name('.datatable');
                Route::post('/update', 'CancelRequestController@update')->name('.update');
                Route::post('/change-cancel-request-status', 'CancelRequestController@changeCancelRequestStatus')->name('.changeCancelRequestStatus');
            });

            Route::group(['prefix' => 'pages', 'as' => '.pages'], function () {
                Route::get('/{type}', 'PageController@index');
                Route::get('getData/{type}', 'PageController@getData')->name('.datatable');
                Route::get('/create/{type}', 'PageController@create')->name('.create');
                Route::post('/store', 'PageController@store')->name('.store');
                Route::get('/edit/{type}', 'PageController@edit')->name('.edit');
                Route::post('/update', 'PageController@update')->name('.update');
                Route::get('/show/{id}', 'PageController@show')->name('.show');
                Route::post('/delete', 'PageController@delete')->name('.delete');
                Route::post('/delete-multi', 'PageController@deleteMulti')->name('.deleteMulti');
            });

            Route::group(['prefix' => 'screens', 'as' => '.screens'], function () {
                Route::get('/', 'ScreenController@index');
                Route::get('getData', 'ScreenController@getData')->name('.datatable');
                Route::get('/create', 'ScreenController@create')->name('.create');
                Route::post('/store', 'ScreenController@store')->name('.store');
                Route::get('/edit/{id}', 'ScreenController@edit')->name('.edit');
                Route::post('/update', 'ScreenController@update')->name('.update');
                Route::get('/show/{id}', 'ScreenController@show')->name('.show');
                Route::post('/delete', 'ScreenController@delete')->name('.delete');
                Route::post('/delete-multi', 'ScreenController@deleteMulti')->name('.deleteMulti');
            });

            Route::group(['prefix' => 'sliders', 'as' => '.sliders'], function () {
                Route::get('/', 'SliderController@index');
                Route::get('getData', 'SliderController@getData')->name('.datatable');
                Route::get('/create', 'SliderController@create')->name('.create');
                Route::post('/store', 'SliderController@store')->name('.store');
                Route::get('/edit/{id}', 'SliderController@edit')->name('.edit');
                Route::post('/update', 'SliderController@update')->name('.update');
                Route::get('/show/{id}', 'SliderController@show')->name('.show');
                Route::post('/delete', 'SliderController@delete')->name('.delete');
                Route::post('/delete-multi', 'SliderController@deleteMulti')->name('.deleteMulti');
            });

            Route::group(['prefix' => 'offers', 'as' => '.offers'], function () {
                Route::get('/', 'OfferController@index');
                Route::get('getData', 'OfferController@getData')->name('.datatable');
                Route::get('/create', 'OfferController@create')->name('.create');
                Route::post('/store', 'OfferController@store')->name('.store');
                Route::get('/edit/{id}', 'OfferController@edit')->name('.edit');
                Route::post('/update', 'OfferController@update')->name('.update');
                Route::get('/show/{id}', 'OfferController@show')->name('.show');
                Route::post('/delete', 'OfferController@delete')->name('.delete');
                Route::post('/delete-multi', 'OfferController@deleteMulti')->name('.deleteMulti');
            });

            Route::group(['prefix' => 'coupons', 'as' => '.coupons'], function () {
                Route::get('/', 'CouponController@index');
                Route::get('getData', 'CouponController@getData')->name('.datatable');
                Route::get('/create', 'CouponController@create')->name('.create');
                Route::post('/store', 'CouponController@store')->name('.store');
                Route::get('/edit/{id}', 'CouponController@edit')->name('.edit');
                Route::post('/update', 'CouponController@update')->name('.update');
                Route::get('/show/{id}', 'CouponController@show')->name('.show');
                Route::post('/delete', 'CouponController@delete')->name('.delete');
                Route::post('/delete-multi', 'CouponController@deleteMulti')->name('.deleteMulti');
            });

            Route::group(['prefix' => 'notifications', 'as' => '.notifications'], function () {
                Route::get('/', 'NotificationController@index');
                Route::get('getData', 'NotificationController@getData')->name('.datatable');
                Route::get('/create', 'NotificationController@create')->name('.create');
                Route::post('/store', 'NotificationController@store')->name('.store');
                Route::get('/edit/{id}', 'NotificationController@edit')->name('.edit');
                Route::post('/update', 'NotificationController@update')->name('.update');
                Route::get('/show/{id}', 'NotificationController@show')->name('.show');
                Route::post('/delete', 'NotificationController@delete')->name('.delete');
                Route::post('/delete-multi', 'NotificationController@deleteMulti')->name('.deleteMulti');
                //ajax
                Route::get('/get/notification-data', 'NotificationController@getNotificationData')
                    ->name('.getNotificationData');
            });

            Route::group(['prefix' => 'departments', 'as' => '.departments'], function () {
                Route::get('/', 'DepartmentsController@index');
                Route::get('datatable/{id?}', 'DepartmentsController@datatable')->name('.datatable');
                Route::get('/edit/{id}', 'DepartmentsController@edit')->name('.edit');
                Route::post('/update', 'DepartmentsController@update')->name('.update');
                Route::get('/show/{id}', 'DepartmentsController@show')->name('.show');
                Route::post('/change_active', 'DepartmentsController@changeActive')->name('.change_active');
            });

            Route::group(['prefix' => 'brands', 'as' => '.brands'], function () {
                Route::get('/', 'BrandsController@index');
                Route::get('datatable', 'BrandsController@datatable')->name('.datatable');
                Route::get('create', 'BrandsController@create')->name('.create');
                Route::post('store', 'BrandsController@store')->name('.store');
                Route::get('/edit/{id}', 'BrandsController@edit')->name('.edit');
                Route::post('/update', 'BrandsController@update')->name('.update');
                Route::post('/change_active', 'BrandsController@changeActive')->name('.change_active');
                Route::post('/delete', 'BrandsController@delete')->name('.delete');
            });

            Route::group(['prefix' => 'modells', 'as' => '.modells'], function () {
                Route::get('/show/{id}', 'ModellsController@index');
                Route::get('datatable/{id}', 'ModellsController@datatable')->name('.datatable');
                Route::get('create/{id}', 'ModellsController@create')->name('.create');
                Route::post('store', 'ModellsController@store')->name('.store');
                Route::get('/edit/{id}', 'ModellsController@edit')->name('.edit');
                Route::post('/update', 'ModellsController@update')->name('.update');
                Route::post('/change_active', 'ModellsController@changeActive')->name('.change_active');
                Route::post('/delete', 'ModellsController@delete')->name('.delete');
            });
            Route::group(['prefix' => 'colors', 'as' => '.colors'], function () {
                Route::get('/', 'ColorsController@index');
                Route::get('datatable', 'ColorsController@datatable')->name('.datatable');
                Route::get('create', 'ColorsController@create')->name('.create');
                Route::post('store', 'ColorsController@store')->name('.store');
                Route::get('/edit/{id}', 'ColorsController@edit')->name('.edit');
                Route::post('/update', 'ColorsController@update')->name('.update');
                Route::post('/delete', 'ColorsController@delete')->name('.delete');
            });

            Route::group(['prefix' => 'packages', 'as' => '.packages'], function () {
                Route::get('/', 'PackageController@index');
                Route::get('getData', 'PackageController@getData')->name('.datatable');
                Route::get('/create', 'PackageController@create')->name('.create');
                Route::post('/store', 'PackageController@store')->name('.store');
                Route::get('/edit/{id}', 'PackageController@edit')->name('.edit');
                Route::post('/update', 'PackageController@update')->name('.update');
                Route::get('/show/{id}', 'PackageController@show')->name('.show');
                Route::post('/delete', 'PackageController@delete')->name('.delete');
                Route::post('/delete-multi', 'PackageController@deleteMulti')->name('.deleteMulti');
            });

            Route::group(['prefix' => 'package-types', 'as' => '.package-types'], function () {
                Route::get('/', 'PackageTypeController@index');
                Route::get('getData', 'PackageTypeController@getData')->name('.datatable');
                Route::get('/create/{parent_id}', 'PackageTypeController@create')->name('.create');
                Route::post('/store', 'PackageTypeController@store')->name('.store');
                Route::get('/edit/{id}', 'PackageTypeController@edit')->name('.edit');
                Route::post('/update', 'PackageTypeController@update')->name('.update');
                Route::get('/show/{id}', 'PackageTypeController@show')->name('.show');
                Route::post('/delete', 'PackageTypeController@delete')->name('.delete');
                Route::post('/delete-multi', 'PackageTypeController@deleteMulti')->name('.deleteMulti');

                Route::get('/details/{id}', 'PackageTypeController@details')->name('.details');
                Route::get('getData/details/{id}', 'PackageTypeController@getDataDetails')->name('.datatable-details');

            });
            Route::group(['prefix' => 'package_types_settings/dynamic_types', 'as' => '.package_types_settings.dynamic_types'], function () {
                Route::get('/', 'PackageSettings\DynamicTypesController@index');
                Route::get('getData', 'PackageSettings\DynamicTypesController@getData')->name('.datatable');
                Route::get('/create', 'PackageSettings\DynamicTypesController@create')->name('.create');
                Route::post('/store', 'PackageSettings\DynamicTypesController@store')->name('.store');
                Route::get('/edit/{id}', 'PackageSettings\DynamicTypesController@edit')->name('.edit');
                Route::post('/update', 'PackageSettings\DynamicTypesController@update')->name('.update');
                Route::get('/show/{id}', 'PackageSettings\DynamicTypesController@show')->name('.show');
                Route::post('/delete', 'PackageSettings\DynamicTypesController@delete')->name('.delete');
                Route::post('/delete-multi', 'PackageSettings\DynamicTypesController@deleteMulti')->name('.deleteMulti');
            });
            Route::group(['prefix' => 'package_types_settings/dynamic_times', 'as' => '.package_types_settings.dynamic_times'], function () {
                Route::get('/', 'PackageSettings\DynamicTimesController@index');
                Route::get('getData', 'PackageSettings\DynamicTimesController@getData')->name('.datatable');
                Route::get('/create', 'PackageSettings\DynamicTimesController@create')->name('.create');
                Route::post('/store', 'PackageSettings\DynamicTimesController@store')->name('.store');
                Route::get('/edit/{id}', 'PackageSettings\DynamicTimesController@edit')->name('.edit');
                Route::post('/update', 'PackageSettings\DynamicTimesController@update')->name('.update');
                Route::get('/show/{id}', 'PackageSettings\DynamicTimesController@show')->name('.show');
                Route::post('/delete', 'PackageSettings\DynamicTimesController@delete')->name('.delete');
                Route::post('/delete-multi', 'PackageSettings\DynamicTimesController@deleteMulti')->name('.deleteMulti');
            });

            Route::group(['prefix' => 'package-type-prices', 'as' => '.package-type-prices'], function () {
                Route::get('/{package_id}', 'PackageTypePriceController@index');
                Route::get('getData/{package_id}', 'PackageTypePriceController@getData')->name('.datatable');
                Route::get('/create/{package_id}', 'PackageTypePriceController@create')->name('.create');
                Route::post('/store', 'PackageTypePriceController@store')->name('.store');
                Route::get('/edit/{id}', 'PackageTypePriceController@edit')->name('.edit');
                Route::post('/update', 'PackageTypePriceController@update')->name('.update');
                Route::get('/show/{id}', 'PackageTypePriceController@show')->name('.show');
                Route::post('/delete', 'PackageTypePriceController@delete')->name('.delete');
                Route::post('/delete-package-meal-type', 'PackageTypePriceController@deletePackageMealType')
                    ->name('.deletePackageMealType');
                Route::post('/delete-multi', 'PackageTypePriceController@deleteMulti')->name('.deleteMulti');
                //ajax
                Route::get('/get/sub-types', 'PackageTypePriceController@getSubTypes')->name('.getSubTypes');
            });

            Route::group(['prefix' => 'package-meals', 'as' => '.package-meals'], function () {
                Route::get('/{package_id}', 'PackageMealController@index');
                Route::get('getData/{package_id}', 'PackageMealController@getData')->name('.datatable');
                Route::get('/create/{package_id}', 'PackageMealController@create')->name('.create');
                Route::post('/store', 'PackageMealController@store')->name('.store');
                Route::get('/edit/{id}', 'PackageMealController@edit')->name('.edit');
                Route::post('/update', 'PackageMealController@update')->name('.update');
                Route::get('/show/{id}', 'PackageMealController@show')->name('.show');
                Route::post('/delete', 'PackageMealController@delete')->name('.delete');
                Route::post('/delete-multi', 'PackageMealController@deleteMulti')->name('.deleteMulti');
                //ajax
                Route::get('/get/meals', 'PackageMealController@getMeals')->name('.getMeals');
            });

            Route::group(['prefix' => 'settings', 'as' => '.settings'], function () {
                Route::get('/edit', [SettingController::class, 'index']);
                Route::post('/update', [SettingController::class, 'update'])->name('.update');
                Route::group(['prefix' => 'zones', 'as' => '.zones'], function () {
                    Route::get('/', [ZoneController::class, 'index']);
                    Route::get('getData', [ZoneController::class, 'getData'])->name('.datatable');
                    Route::post('/store', [ZoneController::class, 'store'])->name('.store');
                    Route::get('get-all-zone-cordinates/{id?}', [ZoneController::class, 'get_all_zone_cordinates'])->name('.zoneCoordinates');
                    Route::post('search', [ZoneController::class, 'search'])->name('.search');

                    Route::get('/edit/{id}', [ZoneController::class, 'edit'])->name('.edit');
                    Route::post('/update/{id}', [ZoneController::class, 'update'])->name('.update');

                    Route::post('/delete', [ZoneController::class, 'delete'])->name('.delete');

                });
            });
            Route::group(['prefix' => 'notification-settings', 'as' => '.notification-settings'], function () {
                Route::get('/edit', [NotificationSettingController::class, 'index'])->name('.edit');
                Route::post('/update', [NotificationSettingController::class, 'update'])->name('.update');
            });
        });

    });
});
