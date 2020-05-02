<?php

    namespace App\Models\Tiers;

    use App\Models\ParentModel;
    use App\Models\Tiers\Types\TierType;
    use App\Traits\Model\HasFullName;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Tier extends Authenticatable
    {
        use HasFullName, SoftDeletes;

        /**
         * table
         *
         * @var string
         */
        public $table = 'tiers';

        /**
         * Fillables
         *
         * @var array
         */
        protected $fillable = [
            'firstname',
            'lastname',
            'company',
            'address1',
            'address2',
            'zipcode',
            'city',
            'landline',
            'mobile',
            'fax',
            'email',
            'type_id',
            'code'
        ];

        /** @var array Computed */
        protected $appends = ['full_name'];

        /**
         * Tier Type
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function type()
        {
            return $this->belongsTo(TierType::class);
        }

    }
