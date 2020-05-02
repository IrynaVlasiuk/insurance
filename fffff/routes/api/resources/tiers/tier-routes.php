<?php

    /**
     * Application routes for Tier Entity
     * Covered with auth:api Middleware
     */
    Route::get('tier','TierController@index');
    Route::get('tier/dictionary','TierController@getDictionary');
    Route::get('tier/{tier}','TierController@show');


