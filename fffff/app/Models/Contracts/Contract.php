<?php

    namespace App\Models\Contracts;

    use App\Models\Claims\Claim;
    use App\Models\ParentModel;
    use App\Models\Tiers\Agent;
    use App\Models\Tiers\Customer;
    use Illuminate\Database\Eloquent\SoftDeletes;

    /**
     * Class Contract
     *
     * @package App\Models
     */
    class Contract extends ParentModel
    {
        use SoftDeletes;

        /**
         * Table
         *
         * @var string
         */
        public $table = 'contracts';

        /**
         * Fillable
         *
         * @var array
         */
        protected $fillable = [
            'contract_number',
            'offer',
            'product',
            'deductible_hazards_option',
            'deductible_hail_option',
            'option1',
            'option2',
            'clauses',
            'note',
            'customer_id',
            'agent_id',
            'insee'
        ];

        /** @var array Eager Loaded */
        protected $with = ['agent', 'customer'];

        /**
         * Belongs To Agent
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function agent()
        {
            return $this->belongsTo(Agent::class);
        }

        /**
         * Belongs To Customer
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function customer()
        {
            return $this->belongsTo(Customer::class);
        }

        /**
         * Has Many Claims
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function claims()
        {
            return $this->hasMany(Claim::class)->orderBy('happened_at','DESC');
        }
    }
