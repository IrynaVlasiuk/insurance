<?php

    namespace App\Models\Claims\Assessments\AssessmentStatuses;

    use App\Models\ParentModel;

    class AssessmentStatus extends ParentModel
    {

        /** @var string Table */
        public $table = 'assessment_statuses';

        /** @var array Fillables */
        protected $fillable = [
            'name',
        ];
    }
