<?php

    namespace App\Models\Claims\Assessments\AssessmentDamageTypes;

    use App\Models\ParentModel;

    class AssessmentDamageType extends ParentModel
    {

        /** @var string Table */
        public $table = 'assessment_damage_types';

        /** @var array Fillables */
        protected $fillable = [
            'name',
        ];
    }
