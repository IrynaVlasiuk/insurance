<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Models\History\HistoryRecord;
    use App\Models\Users\User;
    use Exception;
    use Illuminate\Database\Eloquent\ModelNotFoundException;
    use League\OAuth2\Server\Exception\OAuthServerException;
    use Psr\Http\Message\ServerRequestInterface;
    use Response;
    use \Laravel\Passport\Http\Controllers\AccessTokenController as ATC;

    class AuthController extends Controller
    {
        public function manualAuthentication(User $user)
        {
            $token = $user->createToken('Passport')->accessToken;

            $user = collect($user->load('type'));

            $user->put('access_token', $token);

            return $user;
        }
    }
