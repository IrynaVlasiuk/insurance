<?php

    use Illuminate\Database\Seeder;

    class AssessmentsSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            \App\Models\Claims\Assessments\AssessmentStatuses\AssessmentStatus::insert(
                [
                    ['id' => 1, 'name' => 'draft'],
                    ['id' => 2, 'name' => 'provisory'],
                    ['id' => 3, 'name' => 'final'],
                ]
            );

            \App\Models\Claims\Assessments\AssessmentDamageTypes\AssessmentDamageType::insert(
                [
                    ['id' => 1, 'name' => 'multiple'],
                    ['id' => 2, 'name' => 'hail'],
                    ['id' => 3, 'name' => 'storm'],
                    ['id' => 4, 'name' => 'frost'],
                    ['id' => 5, 'name' => 'flooding'],
                ]
            );

            \App\Models\Claims\Assessments\AssessmentCompensationTypes\AssessmentCompensationType::insert(
                [
                    ['id' => 1, 'name' => 'crop loss'],
                    ['id' => 2, 'name' => 'restoration loss'],
                    ['id' => 3, 'name' => 'quality loss'],
                ]
            );
        }
    }
