<?php

namespace App\Providers\Model;

use App\Models\Claims\Assessments\Assessment;
use App\Observers\AssessmentObserver;
use Illuminate\Support\ServiceProvider;

class AssessmentModelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Assessment::observe(AssessmentObserver::class);
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
