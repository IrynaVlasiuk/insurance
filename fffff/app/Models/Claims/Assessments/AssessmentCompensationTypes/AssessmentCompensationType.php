<?php

    namespace App\Models\Claims\Assessments\AssessmentCompensationTypes;

    use App\Models\ParentModel;

    class AssessmentCompensationType extends ParentModel
    {

        /** @var string Table */
        public $table = 'assessment_compensation_types';

        /** @var array Fillables */
        protected $fillable = [
            'name',
        ];
    }
