<?php

    /**
     * Application routes for Tier Entity
     * Covered with auth:api Middleware
     */
//    Route::get('assessor','TierController@index');
    Route::get('assessor/chief', 'AssessorController@getChiefAssessors');
    Route::get('assessor/manager', 'AssessorController@getManagerAssessors');
    Route::get('assessor/chief/dictionary', 'AssessorController@getChiefAssessorsDictionary');
    Route::get('assessor/manager/dictionary', 'AssessorController@getManagerAssessorsDictionary');
    Route::get('tier/{tier}', 'TierController@show');


