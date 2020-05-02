<?php

namespace App\Observers;

use App\Models\History\HistoryRecord;
use App\Models\Survey;
use App\Services\Emails\Entities\SurveyEmailService;
use Carbon\Carbon;

/**
 * Class SurveyObserver
 *
 * @package App\Observers
 */
class SurveyObserver
{
    protected $survey;

    /**
     * @param Survey $survey
     */
    public function created(Survey $survey)
    {
        $this->survey = $survey;

        $this->updateclaimStatus();
/*
        if ((new Carbon($this->survey->datetime_scheduled))->gt(Carbon::now())) {
            $this->sendSurveyCreatedEmailNotification();
        }
*/
        (new HistoryRecord('survey.created', $this->survey->claim, $this->survey))->setRequestUser()->recordSuccessEvent();
    }

    public function updated(Survey $survey)
    {
        $this->survey = $survey;

        if ($this->survey->isDirty('datetime_scheduled')) {
//            if ((new Carbon($this->survey->datetime_scheduled))->gt(Carbon::now())) {
//                $this->sendSurveyUpdatedEmailNotification();
//            }

            (new HistoryRecord('survey.updated', $this->survey->claim, $this->survey))->setRequestUser()->recordSuccessEvent();
        }
    }

    public function deleted(Survey $survey)
    {
        $this->survey = $survey;
        if ((new Carbon($this->survey->datetime_scheduled))->gt(Carbon::now())) {
            $this->sendSurveyCancelEmailNotification();
        }

        (new HistoryRecord('survey.cancelled', $survey->claim, $survey))->setRequestUser()->recordSuccessEvent();
    }

    /**
     * @param Survey $survey
     */
    private function sendSurveyCreatedEmailNotification()
    {
        (new SurveyEmailService($this->survey))->processDefaultSurveyMail();
    }

    private function sendSurveyCancelEmailNotification()
    {
        (new SurveyEmailService($this->survey))->processCancelSurveyMail();
    }

    private function sendSurveyUpdatedEmailNotification()
    {
        (new SurveyEmailService($this->survey))->processUpdateSurveyMail();
    }

    private function updateClaimStatus()
    {
        if ($this->survey->claim->status_id < 4) {
            $this->survey->claim->setStatus('scheduled');
        };
    }
}
