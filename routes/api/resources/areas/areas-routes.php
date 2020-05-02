<?php

    /**
     * Application routes for Area Entity
     * Covered with auth:api Middleware
     */

    Route::get('area', 'AreaController@index');
    Route::get('area/{area}', 'AreaController@show');
    Route::get('area/{area}/assessor', 'AreaController@getAreaAssessors');
    Route::get('area/{area}/assessor/dictionary', 'AreaController@getAreaAssessorsDictionary');


