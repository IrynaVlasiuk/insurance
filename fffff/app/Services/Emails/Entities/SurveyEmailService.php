<?php

    namespace App\Services\Emails\Entities;


    use App\Models\Survey;
    use App\Services\Emails\EmailDeliveryService;

    class SurveyEmailService extends EmailDeliveryService
    {
        public $emailClass = 'App\Mail\Survey\SurveyCreatedMail';

        /** @var Survey Survey */
        public $entity;

        protected $claim;

        protected $chief;
        protected $manager;
        protected $assistants;
        protected $assistantAssessors;

        protected $customer;
        protected $agent;


        /**
         * SurveyEmailService constructor.
         *
         * @param Survey $survey
         */
        public function __construct(Survey $survey)
        {
            parent::__construct();

            $this->entity = $survey;

            $this->claim = $survey->claim->load('chiefAssessor','managerAssessor','assistantAssessors','contract','area');

            $this->chief = $this->claim->chiefAssessor;
            $this->manager = $this->claim->managerAssessor;

            // todo : only target assistants selected for the survey
            $this->assistants = $this->claim->assistantAssessors;
            $this->assistantAssessors = $survey->assistantAssessors->pluck('id', 'id')->toArray();
            $this->customer = $this->claim->contract->customer ?? null;
            $this->agent = $this->claim->contract->agent ?? null;


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

        /**
         * Process Survey email default batch
         */
        public function processDefaultSurveyMail(): void
        {
            if ($this->manager) {
                $this->addRecipient($this->manager, 'manager');
            }
            if ($this->agent) {
                $this->addRecipient($this->agent, 'agent');
            }
            if ($this->customer) {
                $this->addRecipient($this->customer, 'customer');
            }

            if ($this->assistants) {
                foreach ($this->assistants as $assistant) {
                    if(in_array($assistant->id, $this->assistantAssessors)){
                        $this->addRecipient($assistant, 'assistant');
                    }
                }
            }

            $this->sendEmails();
        }

        public function processUpdateSurveyMail()
        {
            $this->emailClass = 'App\Mail\Survey\SurveyUpdatedMail';

            if ($this->manager) {
                $this->addRecipient($this->manager, 'manager');
            }
            if ($this->agent) {
                $this->addRecipient($this->agent, 'agent');
            }
            if ($this->customer) {
                $this->addRecipient($this->customer, 'customer');
            }

            if ($this->assistants) {
                foreach ($this->assistants as $assistant) {
                    if(in_array($assistant->id, $this->assistantAssessors)){
                        $this->addRecipient($assistant, 'assistant');
                    }
                }
            }
            
            $this->sendEmails();
        }

        public function processCancelSurveyMail()
        {
            $this->emailClass = 'App\Mail\Survey\SurveyCancelledMail';

            if ($this->manager) {
                $this->addRecipient($this->manager, 'manager');
            }
            if ($this->agent) {
                $this->addRecipient($this->agent, 'agent');
            }
            if ($this->customer) {
                $this->addRecipient($this->customer, 'customer');
            }

            if ($this->assistants) {
                foreach ($this->assistants as $assistant) {
                    if(in_array($assistant->id, $this->assistantAssessors)){
                        $this->addRecipient($assistant, 'assistant');
                    }
                }
            }

            $this->sendEmails();
        }

        /**
         * Survey Reminder Email
         *
         * @throws \ReflectionException
         */
        public function processReminderSurveyMail(): void
        {
            $this->emailClass = 'App\Mail\Survey\SurveyReminderMail';

            $this->addRecipient($this->manager, 'manager');
            $this->addRecipient($this->agent, 'agent');
            $this->addRecipient($this->customer, 'customer');

            if ($this->assistants) {
                foreach ($this->assistants as $assistant) {
                    if(in_array($assistant->id, $this->assistantAssessors)){
                        $this->addRecipient($assistant, 'assistant');
                    }
                }
            }

            $this->sendEmails();
        }

    }
