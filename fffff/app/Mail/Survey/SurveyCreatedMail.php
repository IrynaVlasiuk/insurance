<?php

    namespace App\Mail\Survey;


    use App\Mail\Mail;
    use App\Models\Survey;
    use App\Http\Controllers\CalendarController;


    class SurveyCreatedMail extends Mail
    {
        /**
         * The available instances.
         *
         */

        public $action = 'email.survey.created';

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
        public $linkGoogleCalendar;

        public $viewFile = 'emails.surveys.survey-created';
        public $pdfFile = 'pdf.surveys.survey-created';
        public $pdfFileName = 'RENDEZ-VOUS EXPERTISE.pdf';
        public $icsFile = 'calendar.ics';

        public $hasAttachment = false;
        public $hasIcsAttachment = true;
        public $ics;


        public function __construct(array $recipient, Survey $survey)
        {
            $this->recipient = $recipient;

            $this->survey = $survey;

            $this->claim = $survey->claim;

            $this->chief = $this->claim->chiefAssessor ?? null;
            $this->manager = $this->claim->managerAssessor ?? null;
            $this->assistants = $this->claim->assistantAssessors ?? null;

            $this->customer = $this->claim->contract->customer ?? null;
            $this->agent = $this->claim->contract->agent ?? null;

            $calObject = new CalendarController($this->survey);

            $this->ics = $calObject->getEventsCalObject();
            $this->linkGoogleCalendar = $calObject->generateLink();

            $this->subject = $this->generateSubject();
        }

        private function generateSubject()
        {
            return 'SUISSE GRELE - Rendez-vous d\'expertise suite à sinistre - Contrat '.$this->claim->contract_number;
        }
    }
