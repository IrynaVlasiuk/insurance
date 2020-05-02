<?php

    /**
     * Application routes for Backoffice User Entity
     * Covered with auth:api Middleware
     *
     * prefix: api/role/backoffice/
     */

    Route::get('user','UserController@index');
    Route::get('user/{user}','UserController@show');

    Route::patch('user/{user}','UserController@updateUser');
    Route::get('user/search/criteria','UserController@searchByCriteria');
    Route::get('user/search/string/{string}','UserController@search');

    Route::get('/user/authenticate/{user}','AuthController@manualAuthentication');
