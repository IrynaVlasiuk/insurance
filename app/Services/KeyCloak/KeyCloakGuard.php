<?php

namespace App\Services\KeyCloak;

use App\Models\Tiers\Tier;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use \App\Models\Users\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeyCloakGuard implements Guard {
    protected $request;
    protected $provider;
    protected $user;
    protected $decodedToken;

    /**
     * Create a new authentication guard.
     *
     * @param  \Illuminate\Contracts\Auth\UserProvider  $provider
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(UserProvider $provider, Request $request)
    {
        $this->request = $request;
        $this->provider = $provider;
        $this->user = NULL;

        $this->authenticate();
    }

    private function authenticate()
    {
        try {
            $keycloak = new KeyCloak();
            $this->decodedToken = $keycloak->decodeToken($this->request->bearerToken());
        } catch (\Exception $e) {
        }
        if ($this->decodedToken) {
            $this->validate([
                'code' => $this->decodedToken->preferred_username
            ]);
        }
    }

    /**
     * Determine if the current user is authenticated.
     *
     * @return bool
     */
    public function check()
    {
        return ! is_null($this->user());
    }

    /**
     * Determine if the current user is a guest.
     *
     * @return bool
     */
    public function guest()
    {
        return ! $this->check();
    }

    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        if (! is_null($this->user)) {
            return $this->user;
        }
    }


    /**
     * Get the ID for the currently authenticated user.
     *
     * @return string|null
     */
    public function id()
    {
        if ($user = $this->user()) {
            return $this->user()->getAuthIdentifier();
        }
    }

    /**
     * Validate a user's credentials.
     *
     * @return bool
     */
    public function validate(Array $credentials=[])
    {
        $keycloak = new KeyCloak();
        $token = new Token($this->request->bearerToken(), $keycloak->client_id);
        if(!$keycloak->validate_token($token)){
            return false;
        }
        $user = User::where('login', current($credentials))->first();
        if (!$user) {
            $user = Tier::where('code', current($credentials))
                ->first();
            if(!$user){
                return false;
            }
        }
        $this->setUser($user);
        return true;
    }

    /**
     * Set the current user.
     *
     * @param  Array $user User info
     * @return void
     */
    public function setUser(Authenticatable $user)
    {
        $this->user = $user;
        return $this;
    }
}