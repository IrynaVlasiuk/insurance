<?php

namespace App\Providers\Model;

use App\Models\Survey;
use App\Observers\SurveyObserver;
use Illuminate\Support\ServiceProvider;

class SurveyModelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Survey::observe(SurveyObserver::class);
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
