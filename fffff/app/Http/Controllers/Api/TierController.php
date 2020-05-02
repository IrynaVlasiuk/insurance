<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Models\Tiers\Tier;

    /**
     * Class TierController
     *
     * @package App\Http\Controllers\Api
     */
    class TierController extends Controller
    {
        /**
         * Get All Tiers
         *
         * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
         */
        public function index()
        {
            return Tier::paginate($this->paginationRecordsAmount);
        }

        /**
         * Get Tier
         *
         * @param Tier $tier
         * @return Tier
         */
        public function show(Tier $tier)
        {
            return $tier;
        }

        /**
         * Get Dictionary
         *
         * @return \Illuminate\Support\Collection
         */
        public function getDictionary()
        {
            return Tier::all()->pluck('full_name','id');
        }
    }
