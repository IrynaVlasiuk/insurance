<?php

    namespace App\Models\Tiers\Types;

    use App\Models\ParentModel;

    class TierType extends ParentModel
    {
        /**
         * Table
         *
         * @var string
         */
        public $table = 'tier_types';

        /**
         * Fillables
         *
         * @var array
         */
        protected $fillable = [
            'name'
        ];
    }
