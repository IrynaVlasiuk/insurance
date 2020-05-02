<?php

    namespace App\Models\Claims\Statuses;


    use App\Models\ParentModel;

    class ClaimStatus extends ParentModel
    {
        /**
         * Table
         * @var string
         */
        public $table = 'claim_statuses';

        /**
         * Fillables
         * @var array
         */
        protected $fillable = [
            'name'
        ];
    }
