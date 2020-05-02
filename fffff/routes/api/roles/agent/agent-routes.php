<?php


    Route::group(['prefix' => 'role/agent'], function () {

        if (request()->is('*api/role/agent/claim*'))
            require __DIR__ . '/resources/claims/agent-claim-routes.php';

        if (request()->is('*api/role/agent/user*'))
            require __DIR__ . '/resources/users/agent-users-routes.php';

        if (request()->is('*api/role/agent/survey*'))
            require __DIR__ . '/resources/surveys/agent-survey-routes.php';

        if (request()->is('*api/role/agent/dashboard*'))
            require __DIR__ . '/resources/dashboard/agent-dashboard-routes.php';
    });
