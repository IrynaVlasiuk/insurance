<?php

    namespace App\Models\Claims\Plots;

    use App\Models\Areas\Area;
    use App\Models\Claims\Assessments\Assessment;
    use App\Models\Claims\Claim;
    use App\Models\ParentModel;

    class ClaimPlot extends ParentModel
    {
        /** @var string Entity table */
        public $table = 'claim_plots';

        /** @var array Fillable */
        protected $fillable = [
            'claim_id',
            'plot_number',
            'object_number',
            'insee',
            'plot_name',
            'crop_code',
            'crop_name',
            'crop_variety',
            'plot_surface',
            'yield',
            'yield_increase',
            'unit_price',
            'deductible_hail_plot',
            'storm_plot',
            'deductible_storm_plot',
            'quality',
            'sandstorm',
            'damaged',
            'harvest_in',
            'capital_sum_estimation'

        ];

        /** @var array Claim Eager Loadedr */
        protected $with = ['claim'];

        protected $appends = ['isFinal', 'isProvisory'];

        /**
         * Claim
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function claim()
        {
            return $this->belongsTo(Claim::class);
        }

        /**
         * Assessment
         */
        public function assessments()
        {
            return $this->hasMany(Assessment::class);
        }

        public function finalAssessment()
        {
            return $this->assessments()->where('assessment_status_id', 3);
        }

        public function provisoryAssessments()
        {
            return $this->assessments()->where('assessment_status_id', 2);
        }

        /**
         * Damage Getter
         *
         * @param $value
         * @return bool
         */
        public function getDamagedAttribute($value)
        {
            return !!$value;
        }

        /**
         * IsFinal Computed Attribute
         *
         * @return bool
         */
        public function getIsFinalAttribute()
        {
            return !!$this->assessments()->where('assessment_status_id', 3)->first();
        }

        public function getIsProvisoryAttribute()
        {
            return !!$this->assessments()->where('assessment_status_id', 2)->first();
        }


        public function scopeFinal($q)
        {
            return $q->whereHas('finalAssessment');
        }

        public function scopeNotFinal($q)
        {
            return $q->whereDoesntHave('finalAssessment');
        }


    }
