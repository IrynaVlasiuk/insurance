<?php

    namespace App\Models\Claims;

    use App\Models\Areas\Area;
    use App\Models\Claims\Assessments\Assessment;
    use App\Models\Claims\InseeCodes\InseeCode;
    use App\Models\Claims\Plots\ClaimPlot;
    use App\Models\Claims\Statuses\ClaimStatus;
    use App\Models\Contracts\Contract;
    use App\Models\History\HistoryRecord;
    use App\Models\ParentModel;
    use App\Models\Survey;
    use App\Models\Users\User;
    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Claim extends ParentModel
    {

        use SoftDeletes;

        /**
         * Table
         *
         * @var string
         */
        public $table = 'claims';

        /**
         * Fillables
         *
         * @var array
         */
        protected $fillable = [
            'external_id',
            'external_system',
            'happened_at',
            'contract_number',
            'damage_type',
            'chief_assessor',
            'manager_assessor',
            'contract_id',
            'area_id',
            'status_id',
            'chief_assessor_id',
            'manager_assessor_id',
            'insee',
            'note',
            'harvest_year',
            'comment'
        ];

        public static $fields = [
            'id',
            'external_id',
            'external_system',
            'happened_at',
            'contract_number',
            'damage_type',
            'chief_assessor_id',
            'manager_assessor_id',
            'contract_id',
            'area_id',
            'status_id'
        ];

        protected $dates = ['happened_at'];

        protected $attributes = [
            'external_system' => 'local',
            'status_id'       => 1
        ];

        /**
         * Eager Loaded By Default
         *
         * @var array
         */
        protected $with = [
            'contract', 'managerAssessor', 'chiefAssessor', 'area', 'inseeCode'
        ];

        /**
         * Additional observable events.
         */
        protected $observables = [
            'delegated',
            'managerAssigned',
            'assistantsAssigned',
        ];

        /**
         * Searchables
         * Columns that are used in full search
         *
         * @var array
         */
        public static $searchable = [
            'id',
            'external_id',
            'external_system',
            'happened_at',
            'created_at',
            'contract_number',
            'damage_type',
            'chief_assessor_id',
            'manager_assessor_id',
            'contract_id',
            'area_id',
            'status_id',
            'insee',
        ];

        protected $appends = ['validationReady'];


        /**
         * Parent boot Override
         *
         */
        protected static function boot()
        {
            parent::boot();

            static::addGlobalScope('order', function (Builder $builder) {
                $builder->orderBy('happened_at', 'asc');
            });
        }

        /**
         * Contract
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function contract()
        {
            return $this->belongsTo(Contract::class);
        }

        /**
         * Belongs To Chief Accessor (Expert)
         *
         * @return mixed
         */
        public function chiefAssessor()
        {
            return $this->belongsTo(User::class, 'chief_assessor_id');
        }

        /**
         * Belongs To Manager Accessor (Expert)
         *
         * @return mixed
         */
        public function managerAssessor()
        {
            return $this->belongsTo(User::class, 'manager_assessor_id');
        }

        /**
         * Assistant Accessors
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
         */
        public function assistantAssessors()
        {
            return $this->belongsToMany(User::class, 'assistant_to_claim', 'claim_id', 'assistant_assessor_id');
        }

        /**
         * Claim Status
         *
         * @return mixed
         */
        public function status()
        {
            return $this->belongsTo(ClaimStatus::class);
        }

        /**
         * Claim)Plots
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function claim_plots()
        {
            return $this->hasMany(ClaimPlot::class);
        }

        public function not_final_claim_plots()
        {
            return $this->hasMany(ClaimPlot::class)->notFinal();
        }

        public function not_final_damaged_claim_plots()
        {
            return $this->hasMany(ClaimPlot::class)->where('damaged', 1)
                ->where('plot_number', '!=', 0)
                ->notFinal();

        }

        public function not_final_global_claim_plot()
        {
            return $this->hasMany(ClaimPlot::class)->where('plot_number', 0)
                ->notFinal();
        }

        /**
         * Area
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function area()
        {
            return $this->belongsTo(Area::class);
        }

        /**
         * Damage Entities
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function surveys()
        {
            return $this->hasMany(Survey::class);
        }

        public function inseeCode()
        {
            return $this->belongsTo(InseeCode::class, 'insee', 'code');
        }

        public function upcomingWeekSurveys()
        {
            return $this->surveys()->withinRange(Carbon::now(), Carbon::now()->addDays(7));
        }

        public function pastWeekSurveys()
        {
            return $this->surveys()->withinRange(Carbon::now()->subDays(7), Carbon::now());
        }

        /** Fire Chief Delegated Event */
        public function fireDelegateEvent()
        {
            $this->fireModelEvent('delegated', false);
        }

        /** Fire Manager Assigned Event */
        public function fireManagerAssignedEvent()
        {
            $this->fireModelEvent('managerAssigned', false);
        }

        /** Fire Assistant Assigned Event */
        public function fireAssistantAssignedEvent()
        {
            $this->fireModelEvent('assistantsAssigned', false);
        }

        /** Fire comment set */
        public function fireCommentSetEvent()
        {
            $this->fireModelEvent('CommentSet', false);
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
                return $q->whereBetween('happened_at', [$from, $to]);
            }
            if ($from) {
                return $q->where('happened_at', '>=', $from);
            }
            return $q->where('happened_at', '<=', $to);
        }

        public function scopeFinal($q)
        {
            $q->whereDoesntHave('not_final_damaged_claim_plots');
        }

        public function scopeActive($q)
        {
            $q->whereNotIn('status_id', []);
        }

        /**
         * Is Claim Final
         *
         * */
        public function canBeValidated()
        {
            return ($this->not_final_damaged_claim_plots()->count()==0 or $this->not_final_global_claim_plot()->count()==0);
        }


        public function getValidationReadyAttribute()
        {
            return $this->canBeValidated();
        }

        /**
         * Set Claim Status
         *
         * @param $status
         */
        public function setStatus($status)
        {
            $oldStatus = $this->status;
            $status = ClaimStatus::whereName($status)->firstOrFail();
            $this->status_id = $status->id;
            $this->save();

            $detail = ($oldStatus ? $oldStatus->name : '') . ' → ' . ($status ? $status->name : '');
            (new HistoryRecord('claim.status.changed', $this, $status))->setRequestUser()->recordSuccessEvent($detail);
        }

        public function touchStatusTimestamp($field)
        {
            $this->attributes[$field] = Carbon::now();
            $this->save();
        }

        /**
         * Check if auth user has access to claim
         *
         * User has access only if he is backoffice user or manager/chief/assistant/area manager of that claim
         *
         * @return bool
         */
        public function userHasAccess()
        {
            if (user()->type->name == 'backoffice' || user()->type->name == 'admin') {
                return true;
            }

            $userId = user()->id;

            $isManagerAssessor = $this->manager_assessor_id == $userId;

            $isChiefAssessor = $this->chief_assessor_id == $userId;

            $isAssistantAssessor = false;
            $isAreaManager = false;

            if ($this->assistantAssessors->count() > 0) {
                foreach ($this->assistantAssessors as $assistant) {
                    if ($assistant->id = $userId) {
                        $isAssistantAssessor = true;
                        break;
                    }
                }
            }

            if (!empty($this->area_id)) {
                $isAreaManager = $this->area->area_manager_id == $userId;
            }

            return $isAreaManager || $isAssistantAssessor || $isChiefAssessor || $isManagerAssessor;
        }

    }
