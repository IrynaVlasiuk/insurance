<?php

    Route::group(['prefix' => 'role/assessor'], function () {
        /** ClaimPlot Routes */
        if (request()->is('*api/role/assessor/claim*'))
            require __DIR__ . '/resources/claims/assessor-claim-routes.php';

        if (request()->is('*api/role/assessor/survey*'))
            require __DIR__ . '/resources/surveys/assessor-survey-routes.php';

        if (request()->is('*api/role/assessor/dashboard*'))
            require __DIR__ . '/resources/dashboard/assessor-dashboard-routes.php';
    });
