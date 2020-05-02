<?php

    namespace App\Services\Claims;

    use App\Models\Claims\Claim;
    use App\Models\Users\User;
    use App\Services\Service;


    /**
     * Class ClaimAssessorManagerService
     * Manages Assessors in scope of Claim
     *
     * @package App\Services\Claims
     */
    class ClaimAssessorManagerService extends Service
    {

        /**
         * Get Assessors Available for Delegation / Assignment
         *
         * @param Claim $claim
         * @return array
         */
        public function getAvailableAssessors(Claim $claim) : array
        {
            /** @var $inAreaAssessors User assessors in Claim Area */
            //$inAreaAssessors = $claim->area->assessors ?? collect([]);

            $countClaimByUser = Claim::selectRaw('manager_assessor_id, count(*) as count')
                ->where('status_id', '<=', 7)
                ->groupBy('manager_assessor_id')
                ->get()
                ->pluck('count', 'manager_assessor_id');

            $inAreaAssessors = User::selectRaw('users.*')
                //->leftJoin('claims', 'claims.manager_assessor_id', '=', 'users.id')
                ->where('users.area_id', $claim->area->id)
                //->where('claims.status_id', '<=', 7)
                //->groupBy('users.id')
                ->get();

            foreach($inAreaAssessors as $assessor){
                if(isset($countClaimByUser[$assessor->id])){
                    $assessor->setAttribute('claims_count', $countClaimByUser[$assessor->id]);
                } else {
                    $assessor->setAttribute('claims_count', 0);
                }
            }

            /** @var $outAreaAssessors User assessors out Claim Area */
            $outAreaAssessors = User::selectRaw('users.*')
                //->leftJoin('claims', 'claims.manager_assessor_id', '=', 'users.id')
                //->where('claims.status_id', '<=', 7)
                ->whereNotIn('users.id', $inAreaAssessors->pluck('id')->toArray())
                //->groupBy('users.id')
                ->get();

            foreach($outAreaAssessors as $assessor){
                if(isset($countClaimByUser[$assessor->id])){
                    $assessor->setAttribute('claims_count', $countClaimByUser[$assessor->id]);
                } else {
                    $assessor->setAttribute('claims_count', 0);
                }
            }


            return ['inArea' => $inAreaAssessors, 'outArea' => $outAreaAssessors];
        }


    }
