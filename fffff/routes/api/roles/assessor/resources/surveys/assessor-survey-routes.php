<?php

    /**
     * Application routes for Assessor Survey Entity
     * Covered with auth:api Middleware
     *
     * prefix: api/role/assessor/
     */

    Route::get('survey', 'SurveyController@getAssessorSurveys');
    Route::get('survey/search/criteria', 'SurveyController@searchAssessorSurveysByCriteria');

