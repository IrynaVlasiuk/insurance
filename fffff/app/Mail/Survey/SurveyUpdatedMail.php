<?php

    namespace App\Mail\Survey;


    use App\Http\Controllers\CalendarController;
    use App\Mail\Mail;
    use App\Models\Survey;


    class SurveyUpdatedMail extends Mail
    {
        /**
         * The available instances.
         *
         */

        public $action = 'email.survey.updated';

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

        public $viewFile = 'emails.surveys.survey-updated';
        public $pdfFile = 'pdf.surveys.survey-updated';
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
            return 'SUISSE GRELE - Modification du rendez-vous d\'expertise suite à sinistre - Contrat '.$this->claim->contract_number;
        }
    }
