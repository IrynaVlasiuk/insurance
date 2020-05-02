<?php

    /**
     * Application routes for Assessor Claim Entity
     * Covered with auth:api Middleware
     *
     * prefix: api/role/assessor/
     */

    Route::get('claim', 'ClaimController@getAssessorClaims');
    Route::get('claim/geo-data','ClaimController@getAssessorClaimsGeoData');
    Route::get('claim/active', 'ClaimController@getAssessorActiveClaims');
    Route::get('claim/search/criteria', 'ClaimController@searchAssessorClaimsByCriteria');
    Route::get('claim/search/string/{string}', 'ClaimController@searchAssessorClaims');

    Route::patch('claim/{claim}/validate/manager', 'ClaimController@validateByManager');
    Route::patch('claim/{claim}/validate/chief', 'ClaimController@validateByChief');
    Route::patch('claim/{claim}/validate/area-manager', 'ClaimController@validateByAreaManager');

    Route::get('claim/filter/assignable', 'ClaimController@getAssessorAssignableClaims');
    Route::get('claim/filter/no-survey', 'ClaimController@getAssessorNoSurveyClaims');
    Route::get('claim/filter/scheduled/future/days/{days}', 'ClaimController@getAssessorUpcomingClaims');
    Route::get('claim/filter/scheduled/past/days/{days}', 'ClaimController@getAssessorRecentClaims');
    Route::get('claim/filter/validation/ready', 'ClaimController@getAssessorValidationReadyClaims');
