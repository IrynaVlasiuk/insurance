<?php

    namespace App\Http\Controllers\Api;

    use App\Models\Areas\Area;
    use App\Models\Users\Scopes\UserScope;
    use App\Models\Users\Types\UserType;
    use App\Models\Users\User;
    use App\Models\Claims\Claim;
    use App\Services\KeyCloak\KeyCloak;
    use App\Services\Users\UserSearchService;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Http\Resources\User as UserResource;
    use Illuminate\Support\Facades\Hash;

    class UserController extends Controller
    {
        /**
         * Get Current Auth User
         *
         * @return \App\Http\Resources\User
         */
        public function getAuthUser()
        {
            return user();
        }

        /**
         * Get all Users
         *
         */
        public function index()
        {
            return User::with('type', 'area')->paginate($this->paginationRecordsAmount);
        }

        public function active()
        {
            return User::with('type', 'area')
                ->where('last_activity', '>=', Carbon::now()->subMinutes(12)->toDateTimeString())
                ->paginate($this->paginationRecordsAmount);
        }

        public function getScopes()
        {
            return UserScope::all();
        }

        public function getTypes()
        {
            return UserType::all();
        }

        public function searchByCriteria(Request $request)
        {
            return (new UserSearchService())->searchByCriteria($request)->paginate($this->paginationRecordsAmount);
        }

        public function search(string $string)
        {
            return (new UserSearchService())->search($string)->paginate($this->paginationRecordsAmount);
        }

        /**
         * Display the specified resource.
         *
         */
        public function show(User $user)
        {
            return $user->load('type', 'area');
        }

        /**
         * Display details.
         *
         */
        public function details(User $user)
        {

            $countClaimsAssigned = Claim::selectRaw('manager_assessor_id, count(*) as count')
                ->where('status_id', '<=', 7)
                ->where('manager_assessor_id', $user->id)
                ->get()
                ->pluck('count','manager_assessor_id');

            $details = array();
            /*
             // TODO: waiting for definition (#139)
            $details[] = ['title' => 'countClaimsAssigned', 'count' => $countClaimsAssigned[$user->id]];
            $details[] = ['title' => 'countClaimsResolved', 'count' => 3];
            $details[] = ['title' => 'countSurveysInProgress', 'count' => "-"];
            $details[] = ['title' => 'countSurveysFinished', 'count' => "-"];
            */
            $result = $details;

            return $result;


        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  \App\Models\Users\User $user
         */
        public function updateAuthUser(Request $request)
        {
            return $this->userUpdate(user(),  $request);
        }

        public function updateUser(User $user, Request $request)
        {
            if($existUser = User::where('login', $request->login)->first()) {
                if($existUser->id !== $request->id) {
                    $user = User::find($user->id);
                    $user->error = 'login';
                    return $user->load('type', 'area');
                }
                return $this->userUpdate($user,  $request);
            } else {
                return $this->userUpdate($user,  $request);
            }
        }

        private function userUpdate(User $user, Request $request)
        {
            try {
                if($request->area_id && (int)$request->area_id > Area::max('id')) {
                    $user = User::find($user->id);
                    $user->error = 'area';
                    $user->max_area = Area::max('id');
                    return $user->load('type', 'area');
                }
                $user->update($request->all());
                if($request->has('passwd')) {
                    $user->password = Hash::make($request->passwd);
                    $user->save();
                }
            } catch (\Exception $e) {
                $user = User::find($user->id);
                $user->error = 'email';
                return $user->load('type', 'area');
            }
            return $user->load('type', 'area');
        }

        public function storeUser(Request $request)
        {
            $user = new User();
            if(!User::where('email', $request->email)->first()) {
                if(!User::where('login', $request->login)->first()) {
                    $user = User::create($request->all());

                    if ($request->has('passwd')) {
                        $user->password = Hash::make($request->passwd);
                        $user->save();
                    }

                    return $user->load('type', 'area');
                } else {
                    $user->error = 'login';
                    return $user;
                }

            } else {
                $user->error = 'email';
                return $user;
            }
        }

        public function pong()
        {
        }
    }
