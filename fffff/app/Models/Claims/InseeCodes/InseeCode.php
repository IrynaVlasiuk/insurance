<?php

    namespace App\Models\Claims\InseeCodes;

    use App\Models\ParentModel;

    class InseeCode extends ParentModel
    {
        /** @var string Entity table */
        public $table = 'insee';

        protected $appends = ['lat','long'];

        public function getLatAttribute()
        {
            return explode(', ',$this->location)[0] ?? null;
        }

        public function getLongAttribute()
        {
            return explode(', ',$this->location)[1] ?? null;
        }

    }
