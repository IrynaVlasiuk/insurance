<?php

    /**
     * Application routes for Contract Entity
     * Covered with auth:api Middleware
     */
    Route::get('contract','ContractController@index');
    Route::get('contract/{contract}','ContractController@show');
    Route::get('contract/{contract}/claim','ContractController@getContractClaims');
