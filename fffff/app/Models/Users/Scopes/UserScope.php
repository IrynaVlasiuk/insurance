<?php

    namespace App\Models\Users\Scopes;

    use App\Models\ParentModel;

    class UserScope extends ParentModel
    {
        /**
         * Table
         *
         * @var string
         */
        public $table = 'user_scopes';

        /**
         * Fillables
         *
         * @var array
         */
        protected $fillable = [
            'name'
        ];
    }
