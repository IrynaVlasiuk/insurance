<?php

    namespace App\Traits\Model;

    /**
     * Trait HasFullName
     * Adds FullName Attribute
     *
     * @package App\Traits\Model1
     */
    trait HasFullName {

        /**
         * Computed FullName Attribute
         *
         * @return string
         */
        public function getFullNameAttribute()
        {
            return $this->company . ((!is_null($this->firstname) || !is_null($this->lastname)) ? (!is_null($this->company) ? ' (' . $this->firstname . ' ' . $this->lastname . ')' : $this->firstname . ' ' . $this->lastname) : '');
        }
    }
