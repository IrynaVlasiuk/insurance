<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Models\Claims\Claim;
    use App\Models\Contracts\Contract;
    use App\Models\Survey;
    use Carbon\Carbon;
    use Illuminate\Http\Request;

    /**
     * Class ClaimController
     *::
     * @package App\Http\Controllers\Api
     */
    class DashboardController extends Controller
    {
        /**
         * @param Request $request
         * @param bool $count
         * @return \Illuminate\Http\JsonResponse|int
         */
        public function getBackofficeAwaitingAssignmentClaims(Request $request, $count = false)
        {
            $claims = Claim::whereIn('status_id', [1, 2]);

            if ($request->area && $request->area != 'all') {
                $claims = $claims->where('area_id', $request->area);
            }

            return $count ? $claims->count() : $this->buildClaimResponse($claims->get());
        }

        /**
         * @param bool $count
         * @return \Illuminate\Http\JsonResponse|int
         */
        public function getAgentAwaitingAssignmentClaims($count = false)
        {
            $claims = Claim::whereIn('contract_id', function ($q){
                $q->select('id')
                    ->from((new Contract())->getTable())
                    ->where('agent_id', \Auth::user('api')->id);
            })->whereIn('status_id', [1, 2]);

            return $count ? $claims->count() : $this->buildClaimResponse($claims->get());
        }

        /**
         * @param bool $count
         * @return \Illuminate\Http\JsonResponse|int
         */
        public function getAssessorAwaitingAssignmentClaims($count = false)
        {
            $claims =  assessor()->areaOrChiefClaims()->whereIn('status_id', [1, 2]);

            return $count ? $claims->count() : $this->buildClaimResponse($claims->get());
        }

        /**
         * @param Request $request
         * @param bool $count
         * @return \Illuminate\Http\JsonResponse|int
         */
        public function getBackofficeAwaitingProcessingClaims(Request $request, $count = false)
        {
            $claims = Claim::where(function ($q) {
                $q->where('status_id', 3)
                ->orWhere(function ($q){
                    $q->whereDoesntHave('surveys', function ($q) {
                        $q->whereNull('validated_at');
                    })
                        ->where('status_id', 5);
                });
            });

            if ($request->area && $request->area != 'all') {
                $claims = $claims->where('area_id', $request->area);
            }

            return $count ? $claims->count() : $this->buildClaimResponse($claims->get());
        }

        /**
         * @param bool $count
         * @return \Illuminate\Http\JsonResponse|int
         */
        // TODO : fix like commit on 17th of April for "getBackofficeAwaitingProcessingClaims"
        public function getAgentAwaitingProcessingClaims($count = false)
        {
            $claims = Claim::whereIn('contract_id', function ($q){
                $q->select('id')
                    ->from((new Contract())->getTable())
                    ->where('agent_id', \Auth::user('api')->id);
            })
            ->where('status_id', 3)
            ->orWhere(function ($q){
                $q->whereDoesntHave('surveys', function ($q) {
                    $q->whereNull('validated_at');
                })
                ->where('status_id', 5);
            });

            return $count ? $claims->count() : $this->buildClaimResponse($claims->get());
        }

        /**
         * @param bool $count
         * @return \Illuminate\Http\JsonResponse|int
         */
        public function getAssessorAwaitingProcessingClaims($count = false)
        {
            $claims =  assessor()->areaOrChiefOrManagerClaims()->where(function ($q) {
                $q->where('status_id', 3)
                ->orWhere(function ($q){
                    $q->whereDoesntHave('surveys', function ($q) {
                        $q->whereNull('validated_at');
                    })
                    ->where('status_id', 5);
                });
            });

            return $count ? $claims->count() : $this->buildClaimResponse($claims->get());
        }

        /**
         * @param Request $request
         * @param bool $count
         * @return \Illuminate\Http\JsonResponse|int
         */
        public function getBackofficeScheduledSurveys(Request $request, $count = false)
        {
            $surveys =  Survey::with('claim')
                ->when($request->area && $request->area != 'all', function ($q) use ($request) {
                    $q->whereHas('claim', function ($q) use ($request){
                        $q->where('area_id', $request->area, 'and');
                    });
                });

            $surveys = $surveys->withinRange(Carbon::now(), Carbon::now()->addDays(7));

            return $count ? $surveys->count() : $this->buildSurveyResponse($surveys->get());
        }

        /**
         * @param bool $count
         * @return \Illuminate\Http\JsonResponse
         */
        public function getAgentScheduledSurveys($count = false)
        {
            $surveys =  Survey::whereIn('claim_id', function ($subQ) {
                    $subQ->select('id')
                        ->from((new Claim())->getTable())
                        ->whereIn('contract_id', function($subQ2) {
                            $subQ2->select('id')
                                ->from((new Contract())->getTable())
                                ->where('agent_id', \Auth::user('api')->id);
                        });
                })->withinRange(Carbon::now(), Carbon::now()->addDays(7));

            return $count ? $surveys->count() : $this->buildSurveyResponse($surveys->get());
        }

        /**
         * @param bool $count
         * @return \Illuminate\Http\JsonResponse|int
         */
        public function getAssessorScheduledSurveys($count = false)
        {
            $surveys =  Survey::whereHas('assistantAssessors', function ($q) {
                $q->where('id', '=', assessor()->id);
            })->orWhereHas('claim', function ($q) {
                $q->where('manager_assessor_id', '=', assessor()->id);
            })->withinRange(Carbon::now(), Carbon::now()->addDays(7));

            return $count ? $surveys->count() : $this->buildSurveyResponse($surveys->with('claim')->get());
        }

        /**
         * @param Request $request
         * @param bool $count
         * @return \Illuminate\Http\JsonResponse|int
         */
        public function getBackofficeAwaitingValidationClaims(Request $request, $count = false)
        {
// TODO : check about statuses "received" and "validated"
            $managerClaims = assessor()->managerClaims()->where('status_id', 6)->pluck('id')->toArray();
            $chiefClaims = assessor()->chiefClaims()->where('status_id', 7)->pluck('id')->toArray();
            $claims =  Claim::whereIn('id', array_merge($managerClaims, $chiefClaims));
            if ($request->area && $request->area != 'all') {
                $claims = $claims->where('area_id', $request->area);
            }

            return $count ? $claims->count() : $this->buildClaimResponse($claims->get());
        }

        /**
         * @param bool $count
         * @return \Illuminate\Http\JsonResponse
         */
        public function getAgentAwaitingValidationClaims($count = false)
        {
            $claims =  Claim::whereIn('contract_id', function ($q){
                $q->select('id')
                    ->from((new Contract())->getTable())
                    ->where('agent_id', \Auth::user('api')->id);
            })->where('status_id', 9);

            return $count ? $claims->count() : $this->buildClaimResponse($claims->get());
        }

        /**
         * @param bool $count
         * @return \Illuminate\Http\JsonResponse|int
         */
        public function getAssessorAwaitingValidationClaims($count = false)
        {
            $managerClaims = assessor()->managerClaims()->where('status_id', 6)->pluck('id')->toArray();
            $chiefClaims = assessor()->chiefClaims()->where('status_id', 7)->pluck('id')->toArray();

            $claims =  Claim::whereIn('id', array_merge($managerClaims, $chiefClaims));

            return $count ? $claims->count() : $this->buildClaimResponse($claims->get());
        }

        /**
         * @param Request $request
         * @param bool $count
         * @return \Illuminate\Http\JsonResponse|int\
         */
        public function getBackofficePastSurveys(Request $request, $count = false)
        {
            if (assessor()->isAreaManager) {
                if ($request->area && $request->area != 'all') {
                    $surveys =  Survey::whereHas('claim', function ($q) use ($request) {
                        $q->where('chief_assessor_id', '=', assessor()->id)->orWhere('manager_assessor_id', '=', assessor()->id);
                        $q->orWhere('area_id', $request->area);
                        $q->orWhereHas('area', function ($q) {
                            $q->where('area_manager_id', '=', assessor()->id);
                        });
                    })->where('validated_at', null)->withinRange(Carbon::now()->subDays(180), Carbon::now());
                } else {
                    $surveys =  Survey::whereHas('claim', function ($q) {
                        $q->where('chief_assessor_id', '=', assessor()->id)->orWhere('manager_assessor_id', '=', assessor()->id);
                        $q->orWhereHas('area', function ($q) {
                            $q->where('area_manager_id', '=', assessor()->id);
                        });
                    })->where('validated_at', null)->withinRange(Carbon::now()->subDays(180), Carbon::now());
                }
            } else {

                if ($request->area && $request->area != 'all') {
                    //$area = $request->area;
                    $surveys = Survey::whereHas('claim', function ($q) use ($request) {
                        $q->where('area_id', $request->area);
                    })->where('validated_at', null)->withinRange(Carbon::now()->subDays(180), Carbon::now());
                } else {
                    $surveys = Survey::where('validated_at', null)->withinRange(Carbon::now()->subDays(180), Carbon::now());
                }
            }

            return $count ? $surveys->count() : $this->buildSurveyResponse($surveys->with('claim')->get());
        }

        /**
         * @param bool $count
         * @return \Illuminate\Http\JsonResponse|int
         */
        public function getAssessorPastSurveys($count = false)
        {
            $surveys =  Survey::whereHas('assistantAssessors', function ($q) {
                $q->where('id', '=', assessor()->id);
            })->orWhereHas('claim', function ($q) {
                $q->where('chief_assessor_id', '=', assessor()->id)->orWhere('manager_assessor_id', '=', assessor()->id);
                $q->OrWhereHas('area', function ($q) {
                    $q->where('area_manager_id', '=', assessor()->id);
                });
            })->where('validated_at', null)->withinRange(Carbon::now()->subDays(180), Carbon::now());

            return $count ? $surveys->count() : $this->buildSurveyResponse($surveys->with('claim')->get());
        }

        public function getBackofficeAreaManagerValidatedClaims(Request $request, $count = false) {

            $claims = Claim::where('status_id', 9);

            if ($request->area && $request->area != 'all') {
                $claims = $claims->where('area_id', $request->area);
            }

            return $count ? $claims->count() : $this->buildClaimResponse($claims->get());
        }

        public function getBackofficeReceivedClaims(Request $request, $count = false) {

            $claims = Claim::where('status_id', 10);

            if ($request->area && $request->area != 'all') {
                $claims = $claims->where('area_id', $request->area);
            }

            return $count ? $claims->count() : $this->buildClaimResponse($claims->get());
        }

        public function getBackofficeAwaitingAreaManagerValidClaims(Request $request, $count = false) {

            $claims = Claim::where('status_id', 8);

            if ($request->area && $request->area != 'all') {
                $claims = $claims->where('area_id', $request->area);
            }

            return $count ? $claims->count() : $this->buildClaimResponse($claims->get());
        }

        /**
         * Get claim cards info for backoffice user
         *
         * @param Request $request
         * @return \Illuminate\Http\JsonResponse
         */
        public function getBackofficeClaimsCardsInfo(Request $request)
        {
            $awaitAssignClaims = $this->getBackofficeAwaitingAssignmentClaims($request, true);
            $awaitProcessClaims = $this->getBackofficeAwaitingProcessingClaims($request, true);
            $awaitValidationClaims = $this->getBackofficeAwaitingValidationClaims($request, true);
            $receivedClaims = $this->getBackofficeReceivedClaims($request, true);
            $areaManagerValidatedClaims = $this->getBackofficeAreaManagerValidatedClaims($request, true);
            $awaitAreaManagerValidationClaims  = $this->getBackofficeAwaitingAreaManagerValidClaims($request, true);

            return response()->json([
                'assignment' => $awaitAssignClaims,
                'processing' => $awaitProcessClaims,
                'validation' => $awaitValidationClaims,
                'areaManager_validation' => $awaitAreaManagerValidationClaims,
                'areaManager_validated' => $areaManagerValidatedClaims,
                'received' => $receivedClaims
            ]);
        }

        /**
         * Get surveys card info for backoffice user
         *
         * @param Request $request
         * @return \Illuminate\Http\JsonResponse
         */
        public function getBackofficeSurveysCardsInfo(Request $request)
        {
            $pastSurveys = $this->getBackofficePastSurveys($request, true);
            $scheduledSurveys = $this->getBackofficeScheduledSurveys($request, true);

            return response()->json([
                'past' => $pastSurveys,
                'scheduled' => $scheduledSurveys,
            ]);
        }

        /**
         * Get claim cards info for assessor user
         *
         * @param Request $request
         * @return \Illuminate\Http\JsonResponse
         */
        public function getAssessorClaimsCardsInfo()
        {
            $awaitAssignClaims = $this->getAssessorAwaitingAssignmentClaims(true);
            $awaitProcessClaims = $this->getAssessorAwaitingProcessingClaims(true);
            $awaitValidationClaims = $this->getAssessorAwaitingValidationClaims( true);

            return response()->json([
                'assignment' => $awaitAssignClaims,
                'processing' => $awaitProcessClaims,
                'validation' => $awaitValidationClaims,
            ]);
        }

        /**
         * Get surveys card info for assessor user
         *
         * @param Request $request
         * @return \Illuminate\Http\JsonResponse
         */
        public function getAssessorSurveysCardsInfo()
        {
            $pastSurveys = $this->getAssessorPastSurveys(true);
            $scheduledSurveys = $this->getAssessorScheduledSurveys( true);

            return response()->json([
                'past' => $pastSurveys,
                'scheduled' => $scheduledSurveys,
            ]);
        }

        /**
         * Get claim cards info for agent user
         *
         * @param Request $request
         * @return \Illuminate\Http\JsonResponse
         */
        public function getAgentClaimsCardsInfo()
        {
            $awaitAssignClaims = $this->getAgentAwaitingAssignmentClaims(true);
            $awaitProcessClaims = $this->getAgentAwaitingProcessingClaims(true);
            $awaitValidationClaims = $this->getAgentAwaitingValidationClaims( true);

            return response()->json([
                'assignment' => $awaitAssignClaims,
                'processing' => $awaitProcessClaims,
                'validation' => $awaitValidationClaims,
            ]);
        }

        /**
         * Get surveys card info for agent user
         *
         * @param Request $request
         * @return \Illuminate\Http\JsonResponse
         */
        public function getAgentSurveysCardsInfo()
        {
            $scheduledSurveys = $this->getAgentScheduledSurveys(true);

            return response()->json([
                'scheduled' => $scheduledSurveys,
            ]);
        }

        /**
         * @param $data
         * @return \Illuminate\Http\JsonResponse
         */
        private function buildClaimResponse($data)
        {
            $returnData = [];

            foreach ($data as $claim) {
                $array = [
                    'id' => $claim->id,
                    'external_id' => $claim->external_id,
                    'happened_at' => $claim->happened_at->toDateString(),
                    'damage_type' => $claim->damage_type,
                    'contract_number' => $claim->contract_number,
                    'area' => null,
                    'contract' => null,
                    'insee_code' => null,
                    'manager_assessor' => null,
                ];

                if ($claim->area) {
                    $array['area']['name'] = $claim->area->name;
                }

                if ($claim->contract) {
                    $array['contract']['customer']['company'] = $claim->contract->customer->company;
                    $array['contract']['product'] = $claim->contract->product;
                }

                if ($claim->inseeCode) {
                    $array['insee_code']['name'] = $claim->inseeCode->name;
                    $array['insee_code']['departement'] = $claim->inseeCode->departement;
                }

                if ($claim->managerAssessor) {
                    $array['manager_assessor']['full_name'] = $claim->managerAssessor->full_name;
                }

                $returnData[] = $array;
            }

            return response()->json($returnData);
        }

        /**
         * @param $data
         * @return \Illuminate\Http\JsonResponse
         */

        private function buildSurveyResponse($data)
        {
            $returnData = [];

            foreach ($data as $survey) {

                $array = [
                    'id' => $survey->id,
                    'datetime_scheduled' => $survey->datetime_scheduled->toDateString(),
                    'claim' => null,
                ];

                if ($survey->claim) {

                    $claim = $survey->claim;

                    $array['claim']['external_id'] = $claim->external_id;

                    if ($claim->contract && $claim->contract->customer) {
                        $array['claim']['contract']['customer']['full_name'] = $claim->contract->customer->full_name;
                    }

                    if ($claim->managerAssessor) {
                        $array['claim']['manager_assessor']['full_name'] = $claim->managerAssessor->full_name;
                    }
                }

                $returnData[] = $array;
            }

            return response()->json($returnData);
        }

    }
