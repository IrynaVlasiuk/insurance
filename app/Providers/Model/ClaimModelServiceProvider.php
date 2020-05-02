<?php

namespace App\Providers\Model;

use App\Models\Claims\Claim;
use App\Observers\ClaimObserver;
use Illuminate\Support\ServiceProvider;

class ClaimModelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Claim::observe(ClaimObserver::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
