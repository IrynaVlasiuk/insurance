<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Claims\Assessments\Assessment;
use App\Models\Claims\Assessments\AssessmentCompensationTypes\AssessmentCompensationType;
use App\Models\Claims\Assessments\AssessmentDamageTypes\AssessmentDamageType;
use App\Models\Claims\Assessments\AssessmentStatuses\AssessmentStatus;
use App\Models\Claims\Plots\ClaimPlot;
use App\Models\Survey;
use http\Message;
use Illuminate\Http\Request;

/**
 * Class AssessmentController
 *
 * @package App\Http\Controllers\Api
 */
class AssessmentController extends Controller
{

    /**
     * @return Assessment[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Assessment::all();
    }

    /**
     * @param Assessment $assessment
     * @return Assessment
     */
    public function show(Assessment $assessment)
    {
        return $assessment->load('status', 'damageType', 'compensationType', 'survey', 'claimPlot');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $claim_plot = $claim_plot_temp = ClaimPlot::where('id', $request->claim_plot_id)->first();

        if(!$assessment = Assessment::where('claim_plot_id', $request->claim_plot_id)->where('survey_id', $request->survey_id)->first()) {
            $user = \Auth::user();
            if($user->type_id == 1) {
                $claim_id = $claim_plot->claim_id;
                $claim_plots = ClaimPlot::where('claim_id', $claim_id)->get();
                foreach ($claim_plots as $plot) {
                    $assessment = Assessment::where('claim_plot_id', $plot->id)->first();
                    if ($assessment && (!$assessment->deleted_at)) {
                        $claimPlot = ClaimPlot::where('id', $assessment->claim_plot_id)->first();
                        if ($claim_plot->plot_name == 'Provision globale') {
                            if ($claimPlot->plot_name !== 'Provision globale') {
                                return response()->json(['error' => true, 'text' => 'You already have created an assesment related to this claim']);
                            }
                        } else {
                            if ($claimPlot->plot_name == 'Provision globale') {
                                return response()->json(['error' => true, 'text' => 'You already have created an assesment related to this claim']);
                            }
                        }
                    }
                }
            }
            if($claim_plot_temp
                && Assessment::where('claim_plot_id', $claim_plot_temp->id)
                    ->where('assessment_status_id', 3)
                    ->exists()){
                return response()->json(['error' => true, 'text' => 'Vous avez déjà saisi une indemnité d’expertise définitive pour cette position']);
            }
            $assessment = $this->createAssesment($request);
        }

        $claim_plot = ClaimPlot::find($assessment->claim_plot_id);
        $claim_plot->update(['capital_sum_estimation' => $request->capital_sum_estimation]);

        return $assessment->load('status', 'damageType', 'compensationType', 'survey', 'claimPlot');
    }

    private function createAssesment($request) {
        $assessment = Assessment::create($request->only([
            'survey_id',
            'claim_plot_id',
            'survey_id',
            'cost_estimation',
            'assessment_damage_type_id',
            'assessment_compensation_type_id',
            'assessment_status_id'
        ]));
        return $assessment;
    }

    /**
     * @param Assessment $assessment
     * @param Request $request
     * @return Assessment
     */
    public function update(Assessment $assessment, Request $request)
    {
        $claimPlot = $assessment->claimPlot;
        if(Assessment::where('claim_plot_id', $claimPlot->id)
            ->where('assessment_status_id', 3)
            ->count() > 1){
                return response()->json(['error' => true, 'text' => 'Vous avez déjà saisi une indemnité d’expertise définitive pour cette position']);
        }
        $assessment->update($request->only([
            'cost_estimation',
            'assessment_damage_type_id',
            'assessment_compensation_type_id',
            'assessment_status_id'
        ]));

        $id = $assessment->claimPlot->id;
        $claimPlot = ClaimPlot::find($id);
        $claimPlot->update(['capital_sum_estimation' => $request->capital_sum_estimation]);

        return $assessment->load('status', 'damageType', 'compensationType', 'survey', 'claimPlot');
    }

    /**
     * @param Assessment $assessment
     * @throws \Exception
     */
    public function delete(Assessment $assessment)
    {
        $assessment->delete();
    }

    /**
     * @return AssessmentDamageType[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getDamageTypes()
    {
        return AssessmentDamageType::all();
    }

    /**
     * @return AssessmentStatus[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getStatuses()
    {
        return AssessmentStatus::all();
    }

    /**
     * @return AssessmentCompensationType[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getCompensationTypes()
    {
        return AssessmentCompensationType::all();
    }

    public function getClaimSurveyAssessments(ClaimPlot $claimPlot, Survey $survey)
    {
        return Assessment::where('claim_plot_id', $claimPlot->id)->where('survey_id', $survey->id)->first();
    }
}
