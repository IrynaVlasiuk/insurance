<?php


    /** Dashboard Routes */
    Route::get('dashboard/claim/filter/awaiting-assignment', 'DashboardController@getAssessorAwaitingAssignmentClaims');
    Route::get('dashboard/claim/filter/awaiting-processing', 'DashboardController@getAssessorAwaitingProcessingClaims');

    Route::get('dashboard/survey/filter/scheduled-surveys', 'DashboardController@getAssessorScheduledSurveys');
    Route::get('dashboard/survey/filter/past-surveys', 'DashboardController@getAssessorPastSurveys');
    Route::get('dashboard/claim/filter/awaiting-validation', 'DashboardController@getAssessorAwaitingValidationClaims');

    Route::get('dashboard/claim/filter/cards', 'DashboardController@getAssessorClaimsCardsInfo');
    Route::get('dashboard/survey/filter/cards', 'DashboardController@getAssessorSurveysCardsInfo');
