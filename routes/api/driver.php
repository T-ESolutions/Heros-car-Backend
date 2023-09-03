<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Driver\AuthController;
use App\Http\Controllers\Api\V1\Driver\OrdersController;
use App\Http\Controllers\Api\V1\Driver\ReviewController;
use App\Http\Controllers\Api\V1\Driver\CarsController;
use App\Http\Controllers\Api\V1\Driver\HomeController;


Route::group([
    'prefix' => "V1/driver",
    'namespace' => 'V1',
    'middleware' => 'assign.guard:providers'
], function () {
    Route::group(['prefix' => "auth"], function () {
        //auth
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/sign-up', [AuthController::class, 'signUp']);
        Route::post('/verify', [AuthController::class, 'verify']);
        Route::post('/resend-code', [AuthController::class, 'resendCode']);
        Route::post('/forget-password', [AuthController::class, 'forgetPassword']);
        Route::post('/social-login', [AuthController::class, 'socialLogin']);
    });
//    'auth:api', 'check_active'
    Route::group(['middleware' => ['check_driver_active']], function () {

        Route::get('/message/check', [HomeController::class, 'checkMessage']);

        Route::group(['prefix' => "auth"], function () {
            Route::get('/logout', [AuthController::class, 'logout']);
            Route::post('/change-password', [AuthController::class, 'changePassword']);
            Route::post('/delete-account', [AuthController::class, 'deleteAccount']);
            Route::get('/profile', [AuthController::class, 'profile']);
            Route::post('/profile/update', [AuthController::class, 'updateProfile']);
        });

        Route::group(['prefix' => "car"], function () {
            Route::post('/store', [CarsController::class, 'store'])->name('car.store');
            Route::post('/update', [CarsController::class, 'update'])->name('car.update');
            Route::get('/my', [CarsController::class, 'myCars']);
            Route::get('/details', [CarsController::class, 'details']);
            Route::get('/data', [CarsController::class, 'data']);
        });
        Route::group(['prefix' => "orders"], function () {
            Route::get('/', [OrdersController::class, 'myOrders']);
            Route::get('/details', [OrdersController::class, 'orderDetails']);
            Route::get('/home', [OrdersController::class, 'home']);
            Route::post('/accept', [OrdersController::class, 'acceptOrder']);
            Route::post('/reject', [OrdersController::class, 'rejectOrder']);
            Route::post('/update-status', [OrdersController::class, 'updateStatus']);
            Route::post('/take-car-live-photos', [OrdersController::class, 'takeCarLivePhotos']);
            Route::post('/add-extra-services', [OrdersController::class, 'addExtraServices']);

            Route::get('/order-questions', [OrdersController::class, 'orderQuestions']);
            Route::post('/accept-reject-order-question', [OrdersController::class, 'acceptRejectOrderQuestion']);
        });

        //Reviews
        Route::group(['prefix' => "reviews"], function () {
            Route::post('/create', [ReviewController::class, 'makeUserReviews']);
        });
    });


});
