<?php

    namespace App\Services\Emails\Entities;

    use App\Models\Claims\Claim;
    use App\Models\Survey;
    use App\Services\Emails\EmailDeliveryService;

    class ClaimEmailService extends EmailDeliveryService
    {

        public $emailClass = 'App\Mail\Claim\ClaimDelegatedMail';

        /** @var Survey Survey */
        public $entity;

        protected $claim;

        protected $chief;
        protected $manager;
        protected $assistants;

        protected $customer;
        protected $agent;


        /**
         * SurveyEmailService constructor.
         *
         * @param Survey $survey
         */
        public function __construct(Claim $claim)
        {
            parent::__construct();
            
            $claim = $claim->load('chiefAssessor','managerAssessor','assistantAssessors','contract', 'area');

            $this->entity = $claim;

            $this->claim = $claim;

            $this->chief = $this->claim->chiefAssessor;
            $this->manager = $this->claim->managerAssessor;
            $this->assistants = $this->claim->assistantAssessors;

            if($this->claim->contract) {
                $this->customer = $this->claim->contract->customer;
            }
            if($this->claim->contract) {
                $this->agent = $this->claim->contract->agent;
            }

            if($this->claim->area->email) {
                $this->emailBCC = [
                    'email'     => $this->claim->area->email,
                    'full_name' => 'BCC',
                    'role'      => 'bcc'
                ];
            } else {
                $this->emailBCC = [
                    'email'     => env('MAIL_BCC'),
                    'full_name' => 'BCC',
                    'role'      => 'bcc'
                ];
            }



        }

        public function processDelegatedClaimMail(): void
        {
            $this->emailClass = 'App\Mail\Claim\ClaimDelegatedMail';

            $this->addRecipient($this->claim->chiefAssessor, 'chief');

            if($this->claim->contract) {
                $this->sendEmails();
            }
        }

        public function processAssignedClaimMail()
        {
            $this->emailClass = 'App\Mail\Claim\ClaimAssignedMail';

            $this->addRecipient($this->manager, 'manager');

            $ccEmails = [];
            if($this->claim->area && $this->claim->area->areaManager){
                $ccEmails []= $this->claim->area->areaManager->email;
            }
            if($this->chief) {
                $ccEmails []= $this->chief->email;
            }

            $this->emailCC = $ccEmails;

            if($this->claim->contract) {
                $this->sendEmails();
            }
        }
    }
