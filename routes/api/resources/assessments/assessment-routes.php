<?php



    Route::get('assessment', 'AssessmentController@index');
    Route::get('assessment/damage-type', 'AssessmentController@getDamageTypes');
    Route::get('assessment/compensation-type', 'AssessmentController@getCompensationTypes');
    Route::get('assessment/status', 'AssessmentController@getStatuses');
    Route::get('assessment/{assessment}', 'AssessmentController@show');
    Route::patch('assessment/{assessment}', 'AssessmentController@update');
    Route::delete('assessment/{assessment}', 'AssessmentController@delete');
    Route::post('assessment', 'AssessmentController@store');


    Route::get('assessment/claim-plot/{claim_plot}/survey/{survey}', 'SurveyController@getClaimSurveyAssessment');
