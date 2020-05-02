<?php

    /**
     * Application routes for agent User Entity
     * Covered with auth:api Middleware
     *
     * prefix: api/role/agent/
     */
    Route::get('user/active', 'UserController@active');
    Route::patch('user/{user}','UserController@updateUser');
    Route::post('user','UserController@storeUser');


    Route::get('/user/authenticate/{user}','AuthController@manualAuthentication');
