<?php

    use Illuminate\Http\Request;

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
    */


    Route::get('me', 'UserController@getAuthUser');
    Route::get('ping', 'UserController@pong');
    Route::post('me', 'UserController@updateAuthUser');

    Route::get('user/{user}', 'UserController@show');

    /** Assessor Role Routes */
    if (request()->is('*api/role/assessor*'))
        require __DIR__ . '/roles/assessor/assessor-routes.php';

    /** Backoffice Role Routes */
    if (request()->is('*api/role/backoffice*'))
        require __DIR__ . '/roles/backoffice/backoffice-routes.php';

    /** Agent Role Routes */
    if (request()->is('*api/role/agent*'))
        require __DIR__ . '/roles/agent/agent-routes.php';


    /** Public Routes without role restriction */

    /** ClaimPlot Routes */
    if (request()->is('*api/claim-plot*'))
        require __DIR__ . '/resources/claim-plots/claim-plot-routes.php';

    /** Claim Routes */
    if (request()->is('*api/claim*'))
        require __DIR__ . '/resources/claims/claim-routes.php';

    /** Tier Routes */
    if (request()->is('*api/tier*'))
        require __DIR__ . '/resources/tiers/tier-routes.php';

    /** Assessor Routes */
    if (request()->is('*api/assessor*'))
        require __DIR__ . '/resources/assessors/assessor-routes.php';

    /** Contract Routes */
    if (request()->is('*api/contract*'))
        require __DIR__ . '/resources/contracts/contract-routes.php';

    /** Area Routes */
    if (request()->is('*api/area*'))
        require __DIR__ . '/resources/areas/areas-routes.php';

    /** Survey Routes */
    if (request()->is('*api/survey*'))
        require __DIR__ . '/resources/surveys/survey-routes.php';

    /** Assessment Routes */
    if (request()->is('*api/assessment*'))
        require __DIR__ . '/resources/assessments/assessment-routes.php';

    /** User Routes */
    if (request()->is('*api/user*'))
        require __DIR__ . '/resources/users/users-routes.php';

    /** Public Routes without role restriction end */


    Route::get('history', 'HistoryController@index');
    Route::get('scope', 'UserController@getScopes');
    Route::get('type', 'UserController@getTypes');



