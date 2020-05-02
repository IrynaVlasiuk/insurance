<?php

namespace App\Providers;

use App\Models\Claims\Claim;
use App\Models\Contracts\Contract;
use App\Models\Survey;
use App\Models\Tiers\Tier;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /** Old Version MySQL Fix */
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Relation::morphMap([
            'surveys' => Survey::class,
            'claims' => Claim::class,
            'contracts' => Contract::class,
            'users' => User::class,
            'tiers' => Tier::class,
        ]);
    }
}
