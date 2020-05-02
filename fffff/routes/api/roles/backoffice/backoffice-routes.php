<?php


    Route::group(['prefix' => 'role/backoffice'], function () {

        if (request()->is('*api/role/backoffice/claim*'))
            require __DIR__ . '/resources/claims/backoffice-claim-routes.php';

        if (request()->is('*api/role/backoffice/user*'))
            require __DIR__ . '/resources/users/backoffice-users-routes.php';

        if (request()->is('*api/role/backoffice/survey*'))
            require __DIR__ . '/resources/surveys/backoffice-survey-routes.php';

        if (request()->is('*api/role/backoffice/dashboard*'))
            require __DIR__ . '/resources/dashboard/backoffice-dashboard-routes.php';
    });
