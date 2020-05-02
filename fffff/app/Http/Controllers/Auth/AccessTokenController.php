<?php

    namespace App\Http\Controllers\Auth;

    use App\Models\History\HistoryRecord;
    use App\Models\Tiers\Tier;
    use App\Models\Users\User;
    use Exception;
    use Illuminate\Database\Eloquent\ModelNotFoundException;
    use League\OAuth2\Server\Exception\OAuthServerException;
    use Psr\Http\Message\ServerRequestInterface;
    use Response;
    use \Laravel\Passport\Http\Controllers\AccessTokenController as ATC;

    class AccessTokenController extends ATC
    {
        /**
         * Laravel Passport /oauth/token Override for Additional logics
         *
         * @param ServerRequestInterface $request
         * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
         */
        public function issueToken(ServerRequestInterface $request)
        {
            try {
                //get username (default is :email)
                $username = $request->getParsedBody()['username'];

                //get user
                //change to 'email' if you want
                //$user = User::where('email', '=', $username)->first();

                $user = User::where('login', '=', $username)->first();
                if(!$user){
                    $user = Tier::where('code', '=', $username)
                        ->first();
                    if($user && $user->type_id == null){
                        $user->type_id = 2;
                    }
                }
                if (!isset($user)) {
                    throw new ModelNotFoundException('Compte utilisateur inexistant.');
                }

                $user = $user->load('type');
                if(env('SSO_ENABLED')){
                    $kc = new \App\Services\KeyCloak\KeyCloak();
                    if($user instanceof User){
                        $login = $user->login;
                    } else {
                        $login = $user->code;
                    }
                    $kc->grant_from_login($login, $request->getParsedBody()['password']);
                    $grant = $kc->grant;
                    if(!$grant){
                        throw new OAuthServerException('Identifiants incorrects.', 6, 'invalid_credentials', 401);
                    }
                    $data = [];
                    $data['access_token'] = $grant->access_token->_raw;
                } else {
                    //generate token
                    $tokenResponse = parent::issueToken($request);

                    //convert response to json string
                    $content = $tokenResponse->getContent();

                    //convert json to array
                    $data = json_decode($content, true);

                    if (isset($data["error"]))
                        throw new OAuthServerException('Identifiants incorrects.', 6, 'invalid_credentials', 401);

                }

                //add access token to user
                $userToken = collect($user);
                $userToken->put('access_token', $data['access_token']);
                $this->onLoginSuccess($user);

                return $userToken;
            } catch (ModelNotFoundException $e) { // email notfound
                //return error message
                $this->onLoginFail($username, 'User not found');
                return response(["message" => "Compte utilisateur inexistant"], 500);
            } catch (OAuthServerException $e) { //password not correct..token not granted
                //return error message
                $this->onLoginFail($username, 'The user credentials were incorrect.');
                return response(["message" => "Mot de passe incorrect"], 500);
            } catch (Exception $e) {
                die($e);
                $this->onLoginFail($username, 'Internal server error.');
                ////return error message
                return response(["message" => "Internal server error"], 500);
            }
        }

        /**
         * @param $email
         */
        public function onLoginSuccess($user)
        {
            (new HistoryRecord( 'auth.login', $user, null, $user))->recordSuccessEvent();
        }

        /**
         * @param $email
         * @param null $error
         */
        public function onLoginFail($email, $error = null)
        {
            $error = $error ? $error . ': ' . $email : $email;
            (new HistoryRecord('auth.login', User::whereEmail($email)->first(), null))->recordErrorEvent($error);
        }
    }
