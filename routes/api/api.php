<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\App\SettingsController;
use App\Http\Controllers\Api\V1\User\HelperController;


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
Route::get('/1', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "good";
});
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => "V1", 'namespace' => 'V1'], function () {
    Route::group(['prefix' => "app"], function () {
        //main screens
        Route::get('/screens', [SettingsController::class, 'screens']);

        Route::get('/pages', [SettingsController::class, 'pages']);
        Route::get('/page/details', [SettingsController::class, 'pageDetails']);

        Route::get('/links', [SettingsController::class, 'links']);

        Route::get('/settings', [SettingsController::class, 'settings']);
        Route::get('/settings/{key}', [SettingsController::class, 'customSettings']);
    });

    Route::group(['prefix' => "helper"], function () {
        Route::get('/page', [HelperController::class, 'pages']);
        Route::get('/departments', [HelperController::class, 'departments']);
        Route::get('/user-trip-terms', [HelperController::class, 'userTripTerms']);
        Route::get('/social-media', [HelperController::class, 'socialMedia']);
        Route::post('/contact-us', [HelperController::class, 'contactUs']);
        Route::get('/brands', [HelperController::class, 'brands']);
        Route::get('/modells', [HelperController::class, 'modells']);
    });
});
