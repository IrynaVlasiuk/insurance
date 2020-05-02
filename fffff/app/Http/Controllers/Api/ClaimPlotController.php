<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Models\Claims\Plots\ClaimPlot;


    /**
     * Class ClaimPlotController
     * ClaimPlot Management
     *
     * @package App\Http\Controllers\Api
     */
    class ClaimPlotController extends Controller
    {

        /**
         * Get All ClaimPlots
         *
         * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
         */
        public function index()
        {
            return ClaimPlot::paginate($this->paginationRecordsAmount);
        }

        /**
         * Show ClaimPlot
         *
         * @param ClaimPlot $claimPlot
         * @return ClaimPlot
         */
        public function show(ClaimPlot $claimPlot): ClaimPlot
        {
            $user = \Auth::user();
            $claim_plot = $claimPlot->load('assessments');
            $claim_plot->user = $user;
            return $claim_plot;
        }

        /**
         * Get Assessments
         * @param ClaimPlot $claimPlot
         * @return mixed
         */
        public function getAssessments(ClaimPlot $claimPlot)
        {
            return $claimPlot->assessments;
        }

    }
