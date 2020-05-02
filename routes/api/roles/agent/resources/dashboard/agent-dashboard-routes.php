<?php


    /** Dashboard Routes */
    Route::get('dashboard/claim/filter/awaiting-assignment', 'DashboardController@getAgentAwaitingAssignmentClaims');
    Route::get('dashboard/claim/filter/awaiting-processing', 'DashboardController@getAgentAwaitingProcessingClaims');
    Route::get('dashboard/survey/filter/scheduled-surveys', 'DashboardController@getAgentScheduledSurveys');
    Route::get('dashboard/claim/filter/awaiting-validation', 'DashboardController@getAgentAwaitingValidationClaims');

    Route::get('dashboard/claim/filter/cards', 'DashboardController@getAgentClaimsCardsInfo');
    Route::get('dashboard/survey/filter/cards', 'DashboardController@getAgentSurveysCardsInfo');
