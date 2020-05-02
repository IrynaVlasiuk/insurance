<?php


    /*
    |--------------------------------------------------------------------------
    | Public API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
    | Applied Middleware : Bindings, Throttle
    */

    Route::get('public-test', function () {
        return response()->json(['message' => 'Public Api Response']);
    });

    Route::post('/password/email', '\App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail');

    Route::post('import/claim','ImportController@importClaims');
    Route::post('import/contract','ImportController@importContracts');

    Route::get('claim/geo-data','ClaimController@getClaimsGeoData');
