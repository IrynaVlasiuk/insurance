<?php

    namespace App\Mail\Claim;


    use App\Mail\Mail;
    use App\Models\Claims\Claim;

    class ClaimAssignedMail extends Mail
    {

        public $action = 'email.claim.assigned';

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

        public $viewFile = 'emails.claims.claim-assigned';
        public $pdfFile = 'pdf.claims.claim-contract-details';
        public $pdfFileName = 'SINISTRE.pdf';

        public $hasAttachment = true;

        /**
         * ClaimAssignedMail constructor.
         *
         * @param array $recipient
         * @param Claim $claim
         */
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


        /**
         * Generate Subject
         *
         * @return string
         */
        private function generateSubject()
        {
            return 'SUISSE GRELE - Affectation du sinistre ' . $this->claim->external_id . ' - Année culturale ' . $this->claim->harvest_year; //$this->recipient['full_name']
        }

    }
