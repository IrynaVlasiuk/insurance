<?php

    /**
     * Application routes for agent Claim Entity
     * Covered with auth:api Middleware
     *
     * prefix: api/role/agent/
     */

    Route::get('claim','ClaimController@index');
    Route::get('claim/geo-data','ClaimController@getClaimsGeoData');
    Route::get('claim/search/criteria','ClaimController@searchByCriteria');
    Route::get('claim/search/string/{string}','ClaimController@search');

    Route::patch('claim/{claim}/status/{status}','ClaimController@setClaimStatus');

    Route::patch('claim/{claim}/validate/manager','ClaimController@validateByManager');
    Route::patch('claim/{claim}/validate/chief','ClaimController@validateByChief');
    Route::patch('claim/{claim}/validate/area-manager','ClaimController@validateByAreaManager');
