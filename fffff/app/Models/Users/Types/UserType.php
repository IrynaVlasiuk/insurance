<?php

    namespace App\Models\Users\Types;

    use App\Models\ParentModel;

    class UserType extends ParentModel
    {
        /**
         * Table
         *
         * @var string
         */
        public $table = 'user_types';

        /**
         * Fillables
         *
         * @var array
         */
        protected $fillable = [
            'name'
        ];
    }
