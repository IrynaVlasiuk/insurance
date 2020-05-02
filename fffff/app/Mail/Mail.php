<?php

    namespace App\Mail;


    use App\Models\Survey;
    use Illuminate\Bus\Queueable;
    use Illuminate\Mail\Mailable;
    use Illuminate\Queue\SerializesModels;
    use PDF;
    use App\Http\Controllers\CalendarController;

    class Mail extends Mailable
    {

        use Queueable, SerializesModels;

        public $action = 'email.default';

        public $viewFile = '';
        public $pdfFile = '';
        public $icsFile = '';

        public $hasAttachment = false;
        public $hasIcsAttachment = false;
        public $ics;
        /**
         * PDF Attachment Generator
         *
         */
        private function generateAttachment()
        {
            return PDF::loadView($this->pdfFile, call_user_func('get_object_vars', $this));
        }
/*
        private function generateIcsAttachment()
        {
           $calObj = new CalendarController();
           return $calObj;
        }
*/
        /**
         * Build the message.
         *
         * @return $this
         */
        public function build()
        {
            // TODO : what if an email has an attachment AND an .ics file ?


            if ($this->hasAttachment) {
                $pdf = $this->generateAttachment();
                return $this->subject($this->subject)
                    ->view($this->viewFile)->attachData($pdf->output(), $this->pdfFileName);
            }

            if ($this->hasIcsAttachment) {

                return $this->subject($this->subject)
                    ->view($this->viewFile)->attachData($this->ics, $this->icsFile, [
                        'mime' => 'text/calendar;charset=utf-8;method=REQUEST',
                    ]);
            } else {
                return $this->subject($this->subject)
                    ->view($this->viewFile);
            }
        }

        /**
         * Render Live Template
         *
         * @return \Illuminate\Contracts\View\View|\Illuminate\View\View
         */
        public function render()
        {
            return view()->make($this->viewFile, call_user_func('get_object_vars', $this));
        }
    }
