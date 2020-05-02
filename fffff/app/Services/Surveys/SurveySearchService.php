<?php

    namespace App\Services\Surveys;

    use App\Models\Survey;
    use App\Services\Service;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Database\Eloquent\Builder;


    /**
     * Class SurveySearchService
     * Manages Claim Search Requests
     *
     * @package App\Services\Claims
     */
    class SurveySearchService extends Service
    {
        protected $paginationRecordsAmount = 30;

        public function searchByCriteria(Request $request)
        {
            $items = Survey::with(['claim'])
                ->when($this->hasLeastOne($request->date_from, $request->date_to), function ($q) use ($request) {
                    $this->searchByDateRange($q, $request->date_from, $request->date_to);
                })
                ->when($this->hasValue($request->claim_external_id), function ($q) use ($request) {
                    $q->whereHas('claim', function ($q) use ($request) {
                        $q->where('external_id', 'LIKE', '%' . $request->claim_external_id . '%');
                    });
                })
                ->when($this->hasValue($request->client_company), function ($q) use ($request) {
                    $q->whereHas('claim', function ($q) use ($request) {
                        $q->whereHas('contract', function ($q) use ($request) {
                            $q->whereHas('customer', function ($q) use ($request) {
                                $q->where('company', 'LIKE', "%$request->client_company%");
                            });
                        });
                    });
                })
                ->paginate($this->paginationRecordsAmount);


            foreach($items as $item) {
                if($item->validated_at) {
                    $item->status = 1;
                } else {
                    $item->status = 0;
                }
            }
            return $items;
        }

        public function searchAssessorSurveysByCriteria(Request $request)
        {
            $blcus = user()->claims()
                ->when($this->hasLeastOne($request->date_from, $request->date_to), function ($q) use ($request) {
                    $q->whereHas('surveys', function ($q) use ($request) {
                        $this->searchByDateRange($q, $request->date_from, $request->date_to);
                    });
                })
                ->when($this->hasValue($request->claim_external_id), function ($q) use ($request) {
                    $q->where('external_id', 'LIKE', '%' . $request->claim_external_id . '%');
                })
                ->when($this->hasValue($request->client_company), function ($q) use ($request) {
                    $q->whereHas('contract', function ($q) use ($request) {
                        $q->whereHas('customer', function ($q) use ($request) {
                            $q->where('company', 'LIKE', "%$request->client_company%");
                        });
                    });
                })
                ->get()->pluck('surveys')->flatten();

            var_dump($blcus->count());
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
                return $q->whereBetween('datetime_scheduled', [$from, (new Carbon($to))->addHours(24)]);
            }
            if ($from) {
                return $q->where('datetime_scheduled', '>=', $from);
            }
            return $q->where('datetime_scheduled', '<=', $to);
        }

    }
