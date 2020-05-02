<?php


    Route::get('user', 'UserController@index');
    Route::get('user/{user}', 'UserController@show');
    Route::get('user/{user}/details','UserController@details');
    Route::get('user/search/criteria', 'UserController@searchByCriteria');
    Route::get('user/search/string/{string}', 'UserController@search');
    
