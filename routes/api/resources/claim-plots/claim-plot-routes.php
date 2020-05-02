<?php

    /**
     * Application routes for ClaimPlot Entity
     * Covered with auth:api Middleware
     */
    Route::get('claim-plot','ClaimPlotController@index');
    Route::get('claim-plot/{claimPlot}','ClaimPlotController@show');


