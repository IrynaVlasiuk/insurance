<?php

namespace App\Providers;

use App\Services\KeyCloak\KeyCloakGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Passport::tokensExpireIn(now()->addHours(28));

        Passport::refreshTokensExpireIn(now()->addHours(28));

        Auth::extend('keycloak', function ($app, $name, array $config) {
            return new KeyCloakGuard(Auth::createUserProvider($config['provider']), $app->make('request'));
        });
        //
    }
}
