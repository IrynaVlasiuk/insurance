<?php

    namespace App\Services\Claims;

    use App\Models\Claims\Claim;
    use App\Models\Claims\Statuses\ClaimStatus;
    use App\Models\Contracts\Contract;
    use App\Models\Tiers\Tier;
    use App\Services\Service;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Http\Request;

    /**
     * Class ClaimSearchService
     * Manages Claim Search Requests
     *
     * @package App\Services\Claims
     */
    class ClaimSearchService extends Service
    {


        /**
         * Search By Criteria
         *
         * @param Request $request
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function searchByCriteria(Request $request)
        {

            $orderBy = $request->has('orderBy') ? json_decode(current($request->orderBy), true) : null;

            if ($orderBy) {
                $claimSorting = new ClaimSorting();
                $claim = $claimSorting->sorting($orderBy);
            } else {
                $claim = new Claim();
            }

            $claim = $claim->when(\Auth::user('api') instanceof Tier, function($q) {
                    $q->whereIn('contract_id', function($subQ) {
                        $subQ->select('id')
                            ->from((new Contract())->getTable())
                            ->where('agent_id', \Auth::user('api')->id);
                    });
                })->when($this->hasLeastOne($request->date_from, $request->date_to), function ($q) use ($request) {
                    $this->searchByDateRange($q, $request->date_from, $request->date_to);
                    /** Contract ID */
                })->when($request->harvest_year, function ($q) use ($request) {
                    $q->where('harvest_year', $request->harvest_year);
                    /** Contract ID */
                })->when($this->hasValue($request->claim_status), function ($q) use ($request) {
                    $status_id = ClaimStatus::whereIn('id', $request->claim_status)->pluck('id', 'id');
                    $q->whereIn('status_id', $status_id);
                    /** Claim ID*/
                })->when($this->hasValue($request->contract_number), function ($q) use ($request) {
                    $q->where('contract_number', 'LIKE', '%' . $request->contract_number . '%');
                    /** Claim ID*/
                })->when($this->hasValue($request->claim_number), function ($q) use ($request) {
                    $q->where('external_id', 'LIKE', '%' . $request->claim_number . '%');
                    /** Damage Type */
                })->when($this->hasValue($request->damage_type), function ($q) use ($request) {
                    $q->where('damage_type', $request->damage_type);
                    /** Area */
                })->when($this->hasValue($request->area_id), function ($q) use ($request) {
                    $q->where('area_id', $request->area_id);
                    /** Chief Assessor */
                })->when($this->hasValue($request->manager_id), function ($q) use ($request) {
                    $q->where('manager_assessor_id', $request->manager_id);
                    /** Manager Assessor */
                })->when($this->hasValue($request->chief_id), function ($q) use ($request) {
                    $q->where('chief_assessor_id', $request->chief_id);
                    /** Customer company */
                })->when($this->hasValue($request->client_company), function ($q) use ($request) {
                    $q->whereHas('contract', function ($q) use ($request) {
                        $q->whereHas('customer', function ($q) use ($request) {
                            $q->where('company', 'LIKE', "%$request->client_company%");
                        });
                    });
                });

            return $claim;
        }


        public function searchUserClaimsByCriteria(Request $request)
        {
            $claim =
                /** Date Range */
                assessor()->claims()->when($this->hasLeastOne($request->date_from, $request->date_to), function ($q) use ($request) {
                    $this->searchByDateRange($q, $request->date_from, $request->date_to);
                    /** Contract ID */
                })->when($this->hasValue($request->contract_number), function ($q) use ($request) {
                    $q->where('contract_number', 'LIKE', '%' . $request->contract_number . '%');
                    /** Claim ID*/
                })->when($this->hasValue($request->claim_number), function ($q) use ($request) {
                    $q->where('external_id', 'LIKE', '%' . $request->claim_number . '%');
                    /** Damage Type */
                })->when($this->hasValue($request->damage_type), function ($q) use ($request) {
                    $q->where('damage_type', $request->damage_type);
                    /** Area */
                })->when($this->hasValue($request->area_id), function ($q) use ($request) {
                    $q->where('area_id', $request->area_id);
                    /** Chief Assessor */
                })->when($this->hasValue($request->manager_id), function ($q) use ($request) {
                    $q->where('manager_assessor_id', $request->manager_id);
                // TODO : check if all criteria are implemented
                })->when($this->hasValue($request->claim_status), function ($q) use ($request) {
                    $status_id = ClaimStatus::whereIn('id', $request->claim_status)->pluck('id', 'id');
                    $q->whereIn('status_id', $status_id);
                    /** Claim ID*/
                })->when($request->harvest_year, function ($q) use ($request) {
                    $q->where('harvest_year', $request->harvest_year);

                    /** Manager Assessor */
                })->when($this->hasValue($request->chief_id), function ($q) use ($request) {
                    $q->where('chief_assessor_id', $request->chief_id);
                    /** Customer company */
                })->when($this->hasValue($request->client_company), function ($q) use ($request) {
                    $q->whereHas('contract', function ($q) use ($request) {
                        $q->whereHas('customer', function ($q) use ($request) {
                            $q->where('company', 'LIKE', "%$request->client_company%");
                        });
                    });
                });;

            $orderBy = $request->has('orderBy') ? json_decode(current($request->orderBy), true) : null;
            if($orderBy){
                $claimSorting = new ClaimSorting();
                $claim = $claimSorting->sorting($orderBy, $claim);
            }

            return $claim;
        }


        /**
         * Search
         *
         * @param $searchString
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function search($searchString)
        {
            $query = Claim::query();

            foreach (Claim::$searchable as $column) {
                $query->orWhere($column, 'LIKE', '%' . $searchString . '%');
            }

            return $query;
        }

        public function searchUserClaims($searchString)
        {
            $query = assessor()->claims();

            foreach (Claim::$searchable as $column) {
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

