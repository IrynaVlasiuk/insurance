<?php

    namespace App\Console\Commands;

    use App\Models\Survey;
    use App\Services\Emails\Entities\SurveyEmailService;
    use Carbon\Carbon;
    use Illuminate\Console\Command;

    class AssessorsReminderCommand extends Command
    {
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'reminder:remind-assessors';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Remind Assessors for upcoming surveys';

        /**
         * Create a new command instance.
         *
         * @return void
         */
        public function __construct()
        {
            parent::__construct();
        }

        /**
         * Execute the console command.
         *
         * @return mixed
         */
        public function handle()
        {
            foreach ($this->getRemindingSurveys() as $survey) {
                (new SurveyEmailService($survey))->processReminderSurveyMail();
            }
        }

        /**
         * Get Reminding Surveys
         *
         * @return mixed
         */
        private function getRemindingSurveys()
        {
            $tomorrow = Carbon::now()->addDay(1)->format('Y-m-d');

            $surveys = Survey::where('datetime_scheduled', $tomorrow)->get();

            return $surveys;
        }
    }
