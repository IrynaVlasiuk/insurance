<?php

    namespace App\Observers;

    class AssessmentObserver
    {
        /**
         * Created
         *
         * @param $assessment
         */
        public function created($assessment)
        {
            $this->updateClaimStatus($assessment);
            $this->updateToValidateClaimStatus($assessment);
        }

        public function updated($assessment)
        {
            $this->updateClaimStatus($assessment);
            $this->updateToValidateClaimStatus($assessment);
        }

        /**
         * Update Claim Status
         *
         * @param $assessment
         */
        public function updateClaimStatus($assessment)
        {
            if ($assessment->survey->claim->status_id < 5) {
                $assessment->survey->claim->setStatus('in_progress');
            };
        }

        public function updateToValidateClaimStatus($assessment)
        {
            if ($assessment->survey->claim->status_id < 6) {
                if ($assessment->survey->claim->canBeValidated()) {
                    $assessment->survey->claim->setStatus('to_validate_manager');
                }
            };
        }
    }

