<?php

    namespace App\Services\Users;

    use App\Models\Users\User;
    use App\Services\Service;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Http\Request;

    /**
     * Class UserSearchService
     * Manages User Search Requests
     *
     * @package App\Services\Users
     */
    class UserSearchService extends Service
    {


        /**
         * Search By Criteria
         *
         * @param Request $request
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function searchByCriteria(Request $request)
        {
            return
                /** Date Range */
                User::with('area','type')->when($this->hasLeastOne($request->date_from, $request->date_to), function ($q) use ($request) {
//                    $this->searchByDateRange($q, $request->date_from, $request->date_to);
                })->when($this->hasValue($request->firstname), function ($q) use ($request) {
                    $q->where('firstname', 'LIKE', '%' . $request->firstname . '%');
                })->when($this->hasValue($request->lastname), function ($q) use ($request) {
                    $q->where('lastname', 'LIKE', '%' . $request->lastname . '%');
                })->when($this->hasValue($request->email), function ($q) use ($request) {
                    $q->where('email', 'LIKE', '%' . $request->email . '%');
                })->when($this->hasValue($request->area_id), function ($q) use ($request) {
                    $q->where('area_id', $request->area_id);
                })->when($this->hasValue($request->type_id), function ($q) use ($request) {
                    $q->where('type_id', $request->type_id);
                });
        }


        /**
         * Search
         *
         * @param $searchString
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function search($searchString)
        {
            $query = User::query();

            foreach (User::$searchable as $column) {
                $query->orWhere($column, 'LIKE', '%' . $searchString . '%');
            }

            return $query;
        }

        public function searchUserUsers($searchString)
        {
            $query = assessor()->claims();

            foreach (User::$searchable as $column) {
                $query->orWhere($column, 'LIKE', '%' . $searchString . '%');
            }

            return $query;
        }


        /**
         * Search by date Range
         *
         * @param Builder $q
         * @param $from
         * @param $to
         * @return $q Builder
         */
        public function searchByDateRange(Builder $q, $from, $to)
        {
            if ($from && $to) {
                return $q->whereBetween('happened_at', [$from, $to]);
            }
            if ($from) {
                return $q->where('happened_at', '>=', $from);
            }
            return $q->where('happened_at', '<=', $to);
        }
    }

