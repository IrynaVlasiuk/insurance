<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Models\Areas\Area;
    use App\Models\Claims\Claim;
    use App\Models\Claims\Statuses\ClaimStatus;
    use App\Models\History\HistoryRecord;
    use App\Models\Survey;
    use App\Models\Users\User;
    use App\Services\Claims\ClaimAssessorManagerService;
    use App\Services\Claims\ClaimSearchService;
    use App\Services\Claims\ClaimSorting;
    use App\Transformers\Assessors\AssessorsAvailableForClaimTransformer;
    use App\Transformers\Claims\ClaimsGeoDataTransformer;
    use Carbon\Carbon;
    use function foo\func;
    use Illuminate\Http\Request;
    use Illuminate\Pagination\Paginator;
    use Illuminate\Support\Facades\DB;
    use League\Fractal\Resource\Item;
    use League\Fractal\Serializer\ArraySerializer;
    use Spatie\Fractal\FractalFacade;
    use App\Models\Claims\Assessments\AssessmentDamageTypes\AssessmentDamageType;
    use App\Models\Claims\Plots\ClaimPlot;

    /**
     * Class ClaimController
     *
     * @package App\Http\Controllers\Api
     */
    class ClaimController extends Controller
    {
        /**
         * Get All Claims
         *
         * @return Claim[]|\Illuminate\Database\Eloquent\Collection
         */
        public function index()
        {
            $params = request()->params;
            $orderBy = $params ? json_decode(current($params), true) : null;

            //For ag-grid server side sorting
            $claimSorting = new ClaimSorting();
            $claim = $claimSorting->sorting($orderBy);

            if (request()->noPaginate) {
                return Claim::orderByRaw('external_id asc')->get();
            }
            return $claim->paginate($this->paginationRecordsAmount);
        }

        public function getAssessorClaimsGeoData()
        {
            $statuses = [1,2,3,5,6,7,8];
            /** Some Test Claims Have No Insee so we need to remove them from map query */

            $claims = assessor()->claims()->whereHas('inseeCode')->whereIn('status_id',$statuses)->get()->load('status');

            /** Mapbox Suitable format of data */
            return [
                'type'     => 'FeatureCollection',
                'csr'      => [
                    'type'       => 'name',
                    'properties' => [
                        'name' => 'rn:ogc:def:crs:OGC:1.3:CRS84'
                    ]
                ],
                'features' => fractal($claims, new ClaimsGeoDataTransformer())->toArray()['data']
            ];
        }

        public function getClaimsGeoData()
        {
            $statuses = [1,2,3,5,6,7,8];
            /** Some Test Claims Have No Insee so we need to remove them from map query */
            $claims = Claim::whereNotNull('insee')->whereIn('status_id',$statuses)->get()->load('status');

            /** Mapbox Suitable format of data */
            return [
                'type'     => 'FeatureCollection',
                'csr'      => [
                    'type'       => 'name',
                    'properties' => [
                        'name' => 'rn:ogc:def:crs:OGC:1.3:CRS84'
                    ]
                ],
                'features' => fractal($claims, new ClaimsGeoDataTransformer())->toArray()['data']
            ];
        }

        /**
         * Get Assessor Claims
         *
         * @return mixed
         */
        public function getAssessorClaims()
        {
            if (request()->noPaginate) {
                return assessor()->claims()->get();
            };

            return assessor()->claims()->paginate($this->paginationRecordsAmount);
        }


        public function getAssessorActiveClaims()
        {

        }

        public function getActiveClaims()
        {

        }

        /**
         * Store Claim
         *
         * @param Request $request
         * @return Claim
         */
        public function store(Request $request)
        {
            $claim = (new Claim())->fill($request->all());

            $claim->save();

            $plot = ClaimPlot::create([
                'claim_id' => $claim->id,
                'plot_number' => 1,
                'plot_name' => 'Provision globale',
                'damaged' => true,
                'capital_sum_estimation' => $request->claim_plots['capital_sum_estimation'],
            ]);
            $plot->save();

            return $claim;
        }

        public function getClaimHistory(Claim $claim){
            $history = HistoryRecord::with(['user'])
            ->where(function($q) use ($claim) {
                $q->where(function ($q) use ($claim) {
                    $q->where('source_entity_name', 'claims')
                        ->where('source_entity_id', $claim->id);
                })->orWhere(function ($q) use ($claim) {
                    $q->where('destination_entity_name', 'claims')
                        ->where('destination_entity_id', $claim->id);
                });
            })->orWhere(function($q) use ($claim) {
                $q->where(function ($q) use ($claim) {
                    $q->where('source_entity_name', 'surveys')
                        ->whereIn('source_entity_id', function ($q) use ($claim) {
                            $q->select('id')
                                ->from((new Survey())->getTable())
                                ->where('claim_id', $claim->id);
                        });
                })->orWhere(function ($q) use ($claim) {
                    $q->where('destination_entity_name', 'surveys')
                        ->whereIn('destination_entity_id', function ($q) use ($claim) {
                            $q->select('id')
                                ->from((new Survey())->getTable())
                                ->where('claim_id', $claim->id);
                        });
                });
            })->paginate($this->paginationRecordsAmount);

            return $history;
        }

        /**
         * Show claim
         *
         * @param Claim $claim
         * @return Claim|\Illuminate\Http\JsonResponse
         */
        public function show(Claim $claim)
        {
            if (!$claim->userHasAccess()) {
                return response()->json(false, 403);
            };

            return $claim->load(
                'claim_plots',
                'chiefAssessor',
                'managerAssessor',
                'assistantAssessors',
                'contract', 'status', 'area', 'surveys');
        }

        /**
         * Search Across All Columns
         *
         * @param string $string
         * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
         */
        public function search(string $string)
        {
            return (new ClaimSearchService())->search($string)->paginate($this->paginationRecordsAmount);
        }

        /***
         * Search By Criteria
         *
         * @param Request $request
         * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
         */
        public function searchByCriteria(Request $request)
        {
            return (new ClaimSearchService())->searchByCriteria($request)->paginate($this->paginationRecordsAmount);
        }

        /**
         * Get Claim Damage Type Dictionary
         *
         * @return mixed
         */
        public function getDamageTypeDictionary()
        {
            $damage_type = Claim::groupBy('damage_type')->get()->pluck('damage_type', 'id')->values();
            $damage_type['user_type'] = \Auth::user()->type_id;

            return $damage_type;
        }

        public function getClaimDamageTypeDictionary()
        {
            $user = \Auth::user();
            $damage_type = AssessmentDamageType::all()->pluck('name', 'id');
            $damage_type['user_type'] = $user->type_id;
            return $damage_type;
        }

        public function getClaimStatusDictionary()
        {
            return ClaimStatus::all()->pluck('name', 'id');
        }

        /**
         * Get ClaimPlots of Claim
         *
         * @param Claim $claim
         * @return mixed
         */
        public function getClaimClaimPlots(Claim $claim)
        {
            return $claim->claim_plots;
        }

        /**
         * Get Available for Delegation/Assignment Assessors
         * Response Formatted for front-end
         *
         * @param Claim $claim
         */
        public function getAvailableAssessors(Claim $claim)
        {
            /** @var $assessors User assessors available for Claim Delegation */
            $assessors = (new ClaimAssessorManagerService)->getAvailableAssessors($claim);

            return $this->transformerManager->createData((new Item($assessors, new AssessorsAvailableForClaimTransformer)))->toArray();
        }

        /**
         * Claim Assistant Assessors
         *
         * @param Claim $claim
         * @return mixed
         */
        public function getClaimAssistantAssessors(Claim $claim)
        {
            return $claim->assistantAssessors;
        }

        /**
         * Get Claim Damage Entities
         *
         * @param Claim $claim
         * @return mixed
         */
        public function getClaimSurveys(Claim $claim)
        {
            $surveys = $claim->surveys;

            foreach ($surveys as $survey) {
                if($survey->validated_at) {
                    $survey['status'] = 'Terminé';
                } else {
                    $survey['status'] = 'En cours';
                }
            }
            return $surveys;
        }


        public function validateByManager(Claim $claim)
        {
            if ($claim->status_id < 7) {
                if ($claim->chiefAssessor) {
                    $claim->setStatus('to_validate_chief');
                } else {
                    $claim->setStatus('to_validate_area_manager');
                }
                $claim->touchStatusTimestamp('validated_manager_at');
            }
            return $claim;
        }

        public function validateByChief(Claim $claim)
        {
            if ($claim->status_id < 8) {
                $claim->setStatus('to_validate_area_manager');
                $claim->touchStatusTimestamp('validated_chief_at');
            }
            return $claim;
        }

        public function validateByAreaManager(Claim $claim)
        {
            if ($claim->status_id < 9) {
                $claim->setStatus('validated_by_area_manager');
                $claim->touchStatusTimestamp('validated_area_manager_at');
            }
            return $claim;
        }

        public function setClaimStatus(Claim $claim, $claim_status)
        {
            $claim->setStatus($claim_status);

            if ($claim_status === 'waivered') {
                $claim->touchStatusTimestamp('waivered_at');
            }

            return $claim;
        }

        /**
         * Delegate Claim to Assessors
         *
         * @param Claim $claim
         */
        public function setChiefAssessor(Claim $claim, Request $request)
        {
            $claim->update(['chief_assessor_id' => $request->chief_assessor_id]);

            $claim->load('chiefAssessor', 'managerAssessor', 'assistantAssessors');

            $claim->fireDelegateEvent();

            return $claim;
        }

        /**
         * Assign Claim to Assessors
         *
         * @param Claim $claim
         */
        public function setMangerAssessor(Claim $claim, Request $request)
        {
            $claim->update(['manager_assessor_id' => $request->manager_assessor_id]);

            $claim->fireManagerAssignedEvent();

            return $claim->load('chiefAssessor', 'managerAssessor', 'assistantAssessors');
        }

        /**
         * Assign Assistant Assessors
         *
         * @param Claim $claim
         */
        public function setAssistantAssessors(Claim $claim, Request $request)
        {
            $claim->assistantAssessors()->sync($request->assistant_assessor_ids);

            $claim->fireAssistantAssignedEvent();

            return $claim->load('chiefAssessor', 'managerAssessor', 'assistantAssessors');
        }

        /**
         * Get Claim Assessments
         *
         * @param Claim $claim
         * @return mixed
         */
        public function getAssessments(Claim $claim)
        {
            return $claim->assessments;
        }


        public function searchAssessorClaimsByCriteria(Request $request)
        {
            return (new ClaimSearchService())->searchUserClaimsByCriteria($request)->paginate($this->paginationRecordsAmount);
        }

        public function searchAssessorClaims(string $string)
        {
            $foundClaims = (new ClaimSearchService())->searchUserClaims($string)->get();
            return new Paginator($foundClaims, 100);
        }

        public function setClaimComment(Claim $claim, Request $request)
        {

            $claim->update(['comment' => $request->comment]);

            $claim->fireManagerAssignedEvent();

            return $claim->load(
                'claim_plots',
                'chiefAssessor',
                'managerAssessor',
                'assistantAssessors',
                'contract', 'status', 'area', 'surveys');
        }

    }
