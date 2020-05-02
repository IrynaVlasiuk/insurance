<?php

    namespace App\Observers;

    use App\Models\Claims\Claim;
    use App\Models\History\HistoryRecord;
    use App\Services\Emails\Entities\ClaimEmailService;

    class ClaimObserver
    {

        /**
         * @param Claim $claim
         */
        public function created(Claim $claim)
        {
            (new HistoryRecord('claim.created', null, $claim))->setRequestUser()->recordSuccessEvent();
        }

        /**
         * @param Claim $claim
         */
        public function delegated(Claim $claim)
        {
            (new ClaimEmailService($claim))->processDelegatedClaimMail();

            if ($claim->status_id <= 1) {
                $claim->setStatus('delegated');
            }

            (new HistoryRecord('claim.delegated', $claim, $claim->chiefAssessor))->setRequestUser()->recordSuccessEvent();
        }

        /**
         * @param Claim $claim
         */
        public function managerAssigned(Claim $claim)
        {
            (new ClaimEmailService($claim))->processAssignedClaimMail();

            if ($claim->status_id < 3) {
                $claim->setStatus('assigned');
            }

            (new HistoryRecord('claim.manager-assigned', $claim, $claim->managerAssessor))->setRequestUser()->recordSuccessEvent();
        }

        /**
         * @param Claim $claim
         */
        public function assistantsAssigned(Claim $claim)
        {
//            (new ClaimEmailService($claim))->processAssignedClaimMail();

            (new HistoryRecord('claim.assistants-assigned', $claim, null))->setRequestUser()->recordSuccessEvent();
        }

    }
