<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Models\Claims\Assessments\Assessment;
    use App\Models\Claims\Claim;
    use App\Models\Claims\Plots\ClaimPlot;
    use App\Models\Contracts\Contract;
    use App\Models\Survey;
    use App\Models\Tiers\Tier;
    use App\Services\Emails\Entities\SurveyEmailService;
    use App\Services\Surveys\SurveySearchService;
    use Carbon\Carbon;
    use Illuminate\Http\Request;

    class SurveyController extends Controller
    {
        /**
         * Get Surveys
         *
         * @return Survey[]|\Illuminate\Database\Eloquent\Collection
         */
        public function index()
        {
            $surveys = Survey::with(['claim'])
                ->when(\Auth::user('api') instanceof Tier, function($q) {
                $q->whereIn('claim_id', function ($subQ) {
                    $subQ->select('id')
                    ->from((new Claim())->getTable())
                    ->whereIn('contract_id', function($subQ2) {
                        $subQ2->select('id')
                            ->from((new Contract())->getTable())
                            ->where('agent_id', \Auth::user('api')->id);
                    });
                });
            })->whereHas('claim')
                ->paginate($this->paginationRecordsAmount);

            foreach ($surveys as $survey) {
                if($survey->validated_at) {
                  $survey->status = 1;
                } else {
                    $survey->status = 0;
                }
            }
            return $surveys;
        }

        /**
         * Show Survey
         *
         * @param Survey $survey
         * @return Survey
         */
        public function show(Survey $survey)
        {
            $survey->load('claim', 'assistantAssessors');

            if (!$survey->claim->userHasAccess()) {
                return response()->json(false, 403);
            };

            $assessment = Assessment::where('survey_id', $survey->id)->first();
            $survey->setAttribute('assessments', $assessment);
            return $survey;
        }

        public function cancel(Survey $survey){
            $survey->delete();
        }

        /**
         * Store Survey
         *
         * @param Claim $claim
         * @param Request $request
         * @return mixed
         */
        public function store(Request $request)
        {
            $survey = Survey::create($request->only('datetime_scheduled', 'claim_id', 'note'));

            $survey->assistantAssessors()->sync($request->assistant_assessor_ids);

            if ((new Carbon($survey->datetime_scheduled))->gt(Carbon::now())) {
                (new SurveyEmailService($survey))->processDefaultSurveyMail();
            }

            return $survey->load('assistantAssessors', 'claim');
        }

        /**
         * Update Damage Survey
         *
         * @param Survey $survey
         * @param Request $request
         * @return Survey
         */
        public function update(Survey $survey, Request $request)
        {
            (new SurveyEmailService($survey))->processCancelSurveyMail();

            $survey->update($request->only('datetime_scheduled', 'note'));

            if ($request->has('assistant_assessor_ids')) {
                $survey->assistantAssessors()->sync($request->assistant_assessor_ids);
            }
            $survey->load('assistantAssessors', 'claim');

            (new SurveyEmailService($survey))->processDefaultSurveyMail();

            return $survey->load('assistantAssessors', 'claim');
        }

        /**
         * Get Survey Assessments
         *
         * @param Survey $survey
         */
        public function getSurveyAssessments(Survey $survey)
        {
            $survey->assessments;
        }

        public function getAssessorSurveys()
        {
            $surveys = user()->claims()->whereHas('surveys')->get()->pluck('surveys')->flatten();
            for($i = 0; $i<= sizeof($surveys); $i++ ){
                if(isset($surveys[$i])){
                    $surveys[$i]->load('claim');
                }
            }
            return $surveys;
        }

        public function searchAssessorSurveysByCriteria(Request $request)
        {
            return (new SurveySearchService())->searchAssessorSurveysByCriteria($request);
        }

        public function searchSurveysByCriteria(Request $request)
        {
            return (new SurveySearchService())->searchByCriteria($request);
        }

        public function validateSurvey(Survey $survey)
        {
            $survey->touchStatusTimestamp('validated_at');

            return $survey;
        }

        public function unvalidateSurvey(Survey $survey)
        {
            $survey->validated_at = null;
            $survey->save();

            return $survey;
        }

        public function getClaimSurveyAssessment(ClaimPlot $claimPlot, Survey $survey)
        {
            return Assessment::where('claim_plot_id',$claimPlot->id)->where('survey_id',$survey->id)->first();
        }
    }
