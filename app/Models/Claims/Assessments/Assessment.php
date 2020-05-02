<?php

    namespace App\Models\Claims\Assessments;

    use App\Models\Claims\Assessments\AssessmentCompensationTypes\AssessmentCompensationType;
    use App\Models\Claims\Assessments\AssessmentDamageTypes\AssessmentDamageType;
    use App\Models\Claims\Claim;
    use App\Models\Claims\Plots\ClaimPlot;
    use App\Models\ParentModel;
    use App\Models\Survey;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Assessment extends ParentModel
    {

        use SoftDeletes;
        
        /** @var string Table */
        public $table = 'assessments';

        /** @var array Fillables */
        protected $fillable = [
            'survey_id',
            'claim_plot_id',
            'cost_estimation',
            'assessment_damage_type_id',
            'assessment_compensation_type_id',
            'assessment_status_id',
        ];

        /**
         * Survey
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function survey()
        {
            return $this->belongsTo(Survey::class);
        }

        /**
         * ClaimPlot
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function claimPlot()
        {
            return $this->belongsTo(ClaimPlot::class);
        }

        /**
         * Damage Type
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function damageType()
        {
            return $this->belongsTo(AssessmentDamageType::class,'assessment_damage_type_id');

        }

        /**
         * Status
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function status()
        {
            return $this->belongsTo(AssessmentDamageType::class,'assessment_status_id');
        }

        /**
         * Compensation Type
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function compensationType()
        {
            return $this->belongsTo(AssessmentCompensationType::class,'assessment_compensation_type_id');
        }

    }
