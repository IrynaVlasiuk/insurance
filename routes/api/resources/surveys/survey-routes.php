<?php

    /**
     * Application routes for Survey Entity
     * Covered with auth:api Middleware
     */
    Route::get('survey', 'SurveyController@index');
    Route::get('survey/{survey}', 'SurveyController@show');
    Route::get('survey/cancel/{survey}', 'SurveyController@cancel');
    Route::patch('survey/{survey}', 'SurveyController@update');
    Route::post('survey', 'SurveyController@store');
    Route::get('survey/{survey}/assessment', 'SurveyController@getSurveyAssessments');


    Route::patch('survey/{survey}/validate', 'SurveyController@validateSurvey');
    Route::patch('survey/{survey}/unvalidate', 'SurveyController@unvalidateSurvey');
