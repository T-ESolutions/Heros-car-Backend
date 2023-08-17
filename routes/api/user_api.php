<?php

use App\Http\Controllers\Api\V1\User\HelperController;
use App\Http\Controllers\Api\V1\User\OrderController;
use App\Http\Controllers\Api\V1\User\ReviewController;
use App\Http\Controllers\Api\V1\User\ServicesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\User\AuthController;
use App\Http\Controllers\Api\V1\User\HomeController;
use App\Http\Controllers\Api\V1\User\UserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => "V1", 'namespace' => 'V1'], function () {
    Route::group(['prefix' => "auth"], function () {
        //auth
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/sign-up', [AuthController::class, 'signUp']);
        Route::post('/forget-password', [AuthController::class, 'forgetPassword']);
        Route::post('/verify', [AuthController::class, 'verify']);
        Route::post('/resend-code', [AuthController::class, 'resendCode']);
        Route::post('/social-login', [AuthController::class, 'socialLogin']);
    });

    Route::group(['prefix' => "user"], function () {
        //home
        Route::group(['prefix' => "home"], function () {
            Route::get('/services', [HomeController::class, 'services']);
            Route::get('/service-questions', [HomeController::class, 'serviceQuestions']);
            Route::post('/calculate-brand-cost', [HomeController::class, 'calculateBrandCost']);
        });
    });

    Route::group(['middleware' => ['auth:api', 'check_active']], function () {
        Route::group(['prefix' => "auth"], function () {
            Route::get('/logout', [AuthController::class, 'logout']);
            Route::post('/change-password', [AuthController::class, 'changePassword']);
            Route::get('/profile', [AuthController::class, 'profile']);
            Route::post('/update-profile', [AuthController::class, 'updateProfile']);
            Route::post('/delete-account', [AuthController::class, 'deleteAccount']);
        });

        Route::group(['prefix' => "helper"], function () {
            Route::get('/page', [HelperController::class, 'pages']);
            Route::get('/departments', [HelperController::class, 'departments']);
            Route::get('/user-trip', [HelperController::class, 'userTrip']);
            Route::get('/social-media', [HelperController::class, 'socialMedia']);
        });

    });
});
