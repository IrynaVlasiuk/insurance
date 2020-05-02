<?php

    namespace App\Mail\Claim;


    use App\Mail\Mail;
    use App\Models\Claims\Claim;


    class ClaimDelegatedMail extends Mail
    {

        /**
         * The available instances.
         *
         */

        public $action = 'email.claim.delegated';

        public $text;
        public $sender;

        public $job;
        public $subject;

        public $survey;

        public $claim;

        public $plots;

        public $chief;
        public $manager;
        public $assistants;

        public $customer;
        public $agent;

        public $recipient;

        public $link;

        public $viewFile = 'emails.claims.claim-delegated';
        public $pdfFile = 'pdf.claims.claim-contract-details';
        public $pdfFileName = 'SINISTRE.pdf';

        public $hasAttachment = true;


        public function __construct(array $recipient, Claim $claim)
        {
            $this->recipient = $recipient;
            $this->claim = $claim;

            $this->pdfFileName = 'SINISTRE_'.$this->claim->external_id.'.pdf';

            $this->chief = $this->claim->chiefAssessor ?? null;
            $this->manager = $this->claim->managerAssessor ?? null;
            $this->assistants = $this->claim->assistantAssessors ?? null;

            $this->plots = $this->claim->claim_plots ?? null;

            $this->customer = $this->claim->contract->customer ?? null;
            $this->agent = $this->claim->contract->agent ?? null;

            $this->subject = $this->generateSubject();
        }

        private function generateSubject()
        {
            return (env('MAIL_TEST_MODE') ? '[' . env('MAIL_FROM_NAME') . '] ' : '') . 'SUISSE GRELE - Délégation du sinistre ' . $this->claim->external_id;
        }
    }
