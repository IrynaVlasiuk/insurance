<?php

    namespace App\Services\Emails;

    use App\Events\MailSentNotificationEvent;
    use App\Models\History\HistoryRecord;
    use App\Models\Survey;
    use App\Models\Tiers\Tier;
    use App\Models\Users\User;
    use App\Services\Service;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\Log;

    /**
     * Class EmailDeliveryService
     *
     * @package App\Services\Emails
     */
    class EmailDeliveryService extends Service
    {

        /** @var array People That will receive an Email */
        protected $recipients = [];

        protected $testRecipient = [];

        public $emailClass = '';

        public $entity;

        public $testMode = false;

        protected $emailBCC = [];
        protected $emailCC = [];

        public function __construct()
        {
            $this->testRecipient = [
                'email'     => env('MAIL_TEST_RECIPIENT_EMAIL', 'test@test.com'),
                'full_name' => env('MAIL_TEST_RECIPIENT_NAME', 'John Doe'),
                'role'      => 'test'
            ];

            $this->testMode = env('MAIL_TEST_MODE');
            $this->emailBCC = [
                'email'     => env('MAIL_BCC'),
                'full_name' => 'BCC',
                'role'      => 'bcc'
            ];
        }


        /**
         * Add Recipient
         *
         * @param $user
         * @param $role
         * @return bool
         */
        public function addRecipient($user, $role)
        {
            if ($user) {
                if ($user->email && $user->full_name) {
                    $this->recipients[] = ['email' => strtolower($user->email), 'full_name' => $user->full_name, 'role' => $role];
                    return true;
                }
            }
            return false;
        }


        /**
         * Send Emails
         *
         * @throws \ReflectionException
         */
        public function sendEmails()
        {

            /** Check If Automated notifications are Enabled */
            if (env('MAIL_NOTIFICATIONS_DISABLED')) {
                return false;
            }

            /** Send Emails */
            return $this->sendBatchEmails();
        }


        /**
         * Production mode Emails
         *
         * @throws \ReflectionException
         */
        private function sendBatchEmails()
        {
            foreach ($this->recipients as $recipient) {
                $this->sendEmail($recipient);
            }
        }
        /**
         * SendEmail
         *
         * @param $recipient
         * @throws \ReflectionException
         */
        private function sendEmail($recipient)
        {
            $emailInstance = (new \ReflectionClass($this->emailClass))->newInstanceArgs([$recipient, $this->entity]);
            try {
                 if ($this->testMode) {
                    $emailInstance->subject = "[TEST-MODE - ".env('MAIL_FROM_NAME')." - ".$recipient['email']."] ".$emailInstance->subject;
                    Mail::to($this->testRecipient['email'])
                        ->queue($emailInstance);
                } else {
                    if($this->emailCC){
                        Mail::to($recipient['email'])
                            ->bcc($this->emailBCC['email'])
                            ->cc($this->emailCC)
                            ->queue($emailInstance);
                    } else {
                        Mail::to($recipient['email'])
                            ->bcc($this->emailBCC['email'])
                            ->queue($emailInstance);
                    }

                }
                $this->onEmailSuccess($emailInstance, $recipient);
            } catch (\Exception $e) {
                $this->onEmailError($e, $emailInstance, $recipient);
            }
        }

        /**
         * On Email Delivery Success
         *
         * @param $emailInstance
         * @param $recipient
         */
        private function onEmailSuccess($emailInstance, $recipient)
        {
            event(new MailSentNotificationEvent([
                'emailInstance' => $emailInstance,
                'recepient'     => $recipient,
                'status'        => 'success',
                'header'       => 'Email delivered'
            ]));

            if ($emailInstance->action === 'email.claim.delegated') {
                (new HistoryRecord('email.claim.delegated',  $this->getClaimEntity($emailInstance), $this->getRecipientEntity($recipient)))->recordErrorEvent();
            }
            if ($emailInstance->action === 'email.survey.created') {
                (new HistoryRecord('email.survey.created',  $this->getSurveyEntity($emailInstance), $this->getRecipientEntity($recipient)))->recordSuccessEvent();
            }
            if ($emailInstance->action === 'email.survey.updated') {
                (new HistoryRecord('email.survey.updated',  $this->getSurveyEntity($emailInstance), $this->getRecipientEntity($recipient)))->recordErrorEvent();
            }
            if ($emailInstance->action === 'email.survey.cancelled') {
                (new HistoryRecord('email.survey.cancelled',  $this->getSurveyEntity($emailInstance), $this->getRecipientEntity($recipient)))->recordSuccessEvent();
            }
            // TODO : has to be handled
            if ($emailInstance->action === 'email.survey.reminder') {
                (new HistoryRecord('email.survey.reminder', $this->getSurveyEntity($emailInstance), $this->getRecipientEntity($recipient)))->recordSuccessEvent();
            }
        }

        /**
         * On Email Delivery Error
         *
         * @param $exception
         * @param $emailInstance
         * @param $recipient
         */
        private function onEmailError($exception, $emailInstance, $recipient)
        {
            Log::channel('mails')->error($exception->getMessage());
            Log::channel('mails')->error($exception->getTraceAsString());
            event(new MailSentNotificationEvent([
                'emailInstance' => $emailInstance,
                'recepient'     => $recipient,
                'status'        => 'danger',
                'header'       => 'Email failed'
            ]));


            //if($object && $object instanceof Model){
                if ($emailInstance->action === 'email.claim.delegated') {
                    (new HistoryRecord('email.claim.delegated',  $this->getClaimEntity($emailInstance), $this->getRecipientEntity($recipient)))->recordErrorEvent($exception->getMessage());
                }
                if ($emailInstance->action === 'email.survey.created') {
                    (new HistoryRecord('email.survey.created',  $this->getSurveyEntity($emailInstance), $this->getRecipientEntity($recipient)))->recordErrorEvent($exception->getMessage());
                }
                if ($emailInstance->action === 'email.survey.updated') {
                    (new HistoryRecord('email.survey.updated',  $this->getSurveyEntity($emailInstance), $this->getRecipientEntity($recipient)))->recordErrorEvent($exception->getMessage());
                }
                if ($emailInstance->action === 'email.survey.cancelled') {
                    (new HistoryRecord('email.survey.cancelled',  $this->getSurveyEntity($emailInstance), $this->getRecipientEntity($recipient)))->recordErrorEvent($exception->getMessage());
                }
                // TODO : has to be handled
                if ($emailInstance->action === 'email.survey.reminder') {
                    (new HistoryRecord('email.survey.reminder',  $this->getSurveyEntity($emailInstance), $this->getRecipientEntity($recipient)))->recordErrorEvent($exception->getMessage());
                }
            //}
        }

        private function getSurveyEntity($emailInstance)
        {
            return Survey::withTrashed()->findOrFail($emailInstance->survey->id);
        }

        private function getClaimEntity($emailInstance)
        {
            return Claim::withTrashed()->findOrFail($emailInstance->claim->id);
        }

        /**
         * Get Recipient Object Model
         *
         * @param $recipient
         * @return User|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
         */
        private function getRecipientEntity($recipient)
        {
            if ($recipient['role'] == 'agent' || $recipient['role'] == 'customer') {
                return Tier::whereEmail($recipient['email'])->firstOrFail();
            }
            return User::whereEmail($recipient['email'])->first() ?? null;
        }
    }
