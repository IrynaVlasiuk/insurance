<?php


    /** Dashboard Routes */

    Route::get('dashboard/claim/filter/awaiting-assignment', 'DashboardController@getBackofficeAwaitingAssignmentClaims');
    Route::get('dashboard/claim/filter/awaiting-processing', 'DashboardController@getBackofficeAwaitingProcessingClaims');
    Route::get('dashboard/claim/filter/awaiting-validation', 'DashboardController@getBackofficeAwaitingValidationClaims');
    Route::get('dashboard/claim/filter/area-manager-validated', 'DashboardController@getBackofficeAreaManagerValidatedClaims');
    Route::get('dashboard/claim/filter/received', 'DashboardController@getBackofficeReceivedClaims');
    Route::get('dashboard/claim/filter/awaiting-area-manager-validation', 'DashboardController@getBackofficeAwaitingAreaManagerValidClaims');

    Route::get('dashboard/survey/filter/scheduled-surveys', 'DashboardController@getBackofficeScheduledSurveys');
    Route::get('dashboard/survey/filter/past-surveys', 'DashboardController@getBackofficePastSurveys');



    Route::get('dashboard/claim/filter/cards', 'DashboardController@getBackofficeClaimsCardsInfo');
    Route::get('dashboard/survey/filter/cards', 'DashboardController@getBackofficeSurveysCardsInfo');
