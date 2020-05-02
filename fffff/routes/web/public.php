<?php

    /*
    |--------------------------------------------------------------------------
    | Web Public Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */
    Auth::routes();

    Route::post('oauth/token', 'Auth\AccessTokenController@issueToken');

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('home', 'HomeController@index')->name('home');
    Route::get('test', 'HomeController@test');
    Route::get('email/preview/survey', 'HomeController@surveyEmailPreview');
    Route::get('email/preview/claim/delegated', 'HomeController@claimDelegatedEmailPreview');
    Route::get('email/preview/claim/assigned', 'HomeController@claimAssignedEmailPreview');

    Route::get('broadcast', function() {
        event(new \App\Events\MailSentNotificationEvent('Broadcasting in Laravel using Pusher!'));
    });

    Route::get('downloads/{file}', 'DownloadsController@download');
