<?php




    /** Dashboard Routes */
    Route::get('dashboard/claim/filter/awaiting-assignment','DashboardController@getBackofficeAwaitingAssignmentClaims');
    Route::get('dashboard/claim/filter/awaiting-processing','DashboardController@getBackofficeAwaitingProcessingClaims');
