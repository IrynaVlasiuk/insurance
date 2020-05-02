<?php

    /**
     * Application routes for Claim Entity
     * Covered with auth:api Middleware
     */



 
    Route::get('claim/damage-type/dictionary','ClaimController@getDamageTypeDictionary');
    Route::get('claim/create/damage-type/dictionary','ClaimController@getClaimDamageTypeDictionary');
    Route::get('claim/status/dictionary','ClaimController@getClaimStatusDictionary');
    Route::get('claim/{claim}','ClaimController@show');
    Route::get('claim/{claim}/claim-plot','ClaimController@getClaimClaimPlots');
    Route::get('claim/{claim}/assessor/available','ClaimController@getAvailableAssessors');
    Route::get('claim/{claim}/assistant-assessors','ClaimController@getClaimAssistantAssessors');
    Route::get('claim/{claim}/survey','ClaimController@getClaimSurveys');

    Route::post('claim/{claim}/assessor/chief/delegate','ClaimController@setChiefAssessor');
    Route::post('claim/{claim}/assessor/manager/assign','ClaimController@setMangerAssessor');
    Route::post('claim/{claim}/assessor/assistants/assign','ClaimController@setAssistantAssessors');

    Route::post('claim','ClaimController@store');

    Route::patch('claim/comment/{claim}','ClaimController@setClaimComment');
