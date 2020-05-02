<?php

    namespace App\Mail\Survey;


    use App\Mail\Mail;
    use App\Models\Survey;


    class SurveyReminderMail extends Mail
    {

        public $action = 'email.survey.reminder';
        /**
         * The available instances.
         *
         */
        public $text;
        public $sender;


        public $job;
        public $subject;

        public $survey;

        public $claim;

        public $chief;
        public $manager;
        public $assistants;

        public $customer;
        public $agent;

        public $recipient;

        public $link;

        public $viewFile = 'emails.surveys.survey-reminder';
        public $pdfFile = 'pdf.surveys.survey-reminder';

        public $hasAttachment = true;


        public function __construct(array $recipient, Survey $survey)
        {
            $this->recipient = $recipient;
            $this->survey = $survey;

            $this->claim = $survey->claim;

            $this->chief = $this->claim->chiefAssessor;
            $this->manager = $this->claim->managerAssessor;
            $this->assistants = $this->claim->assistantAssessors;

            $this->customer = $this->claim->contract->customer;
            $this->agent = $this->claim->contract->agent;

            $this->subject = $this->generateSubject();
        }

        /**
         * Generate Subject
         *
         * @return string
         */
        private function generateSubject()
        {
            return 'Scheduled Survey reminder. Information for ' . $this->recipient['full_name'];
        }
    }
