<?php

    namespace App\Models;

    use App\Models\Claims\Assessments\Assessment;
    use App\Models\Claims\Claim;
    use App\Models\Claims\Statuses\ClaimStatus;
    use App\Models\Users\User;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Support\Carbon;

    class Survey extends ParentModel
    {
        use SoftDeletes;
        /**
         * Table
         *
         * @var string
         */
        public $table = 'surveys';

        /**
         * Fillable
         *
         * @var array
         */
        protected $fillable = [
            'datetime_scheduled', 'claim_id', 'note'
        ];

        protected $dates = ['datetime_scheduled'];

        /**
         * Parent boot Override
         *
         */
        protected static function boot()
        {
            parent::boot();

            static::addGlobalScope('order', function (Builder $builder) {
                $builder->orderBy('datetime_scheduled', 'asc');
            });
        }

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
         * Assistants
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
         */
        public function assistantAssessors()
        {
            return $this->belongsToMany(User::class, 'assistant_to_survey', 'survey_id', 'assistant_assessor_id');
        }

        /**
         * Assessments
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function assessments()
        {
            return $this->belongsTo(Assessment::class);
        }

        /**
         * Within Range Scope
         *
         * @param $q
         * @param null $from
         * @param null $to
         * @return mixed
         */
        public function scopeWithinRange($q, $from = null, $to = null)
        {
            if ($from && $to) {
                return $q->whereBetween('datetime_scheduled', [$from, $to]);
            }
            if ($from) {
                return $q->where('datetime_scheduled', '>=', $from);
            }
            return $q->where('datetime_scheduled', '<=', $to);
        }

        /**
         * Touch Survey Field Timestamp
         * @param $field
         */
        public function touchStatusTimestamp($field)
        {
            $this->attributes[$field] = Carbon::now();
            $this->save();
        }
    }
