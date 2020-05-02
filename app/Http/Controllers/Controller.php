<?php

    namespace App\Http\Controllers;

    use App\Models\Users\User;
    use Carbon\Carbon;
    use Illuminate\Foundation\Bus\DispatchesJobs;
    use Illuminate\Routing\Controller as BaseController;
    use Illuminate\Foundation\Validation\ValidatesRequests;
    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

    class Controller extends BaseController
    {
        use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        /** @var int Pagination Records Amount */
        protected $paginationRecordsAmount = 30;

        /** @var \League\Fractal\Manager Transformer */
        protected $transformerManager;

        /**
         * Controller constructor.
         */
        public function __construct()
        {
            $this->transformerManager = (new \League\Fractal\Manager())->setSerializer(new \League\Fractal\Serializer\ArraySerializer());

            $user = request()->user('api');
            if($user && $user instanceof User){
                $user->last_activity = Carbon::now()->toDateTimeString();
                $user->save();
            }
        }
    }
