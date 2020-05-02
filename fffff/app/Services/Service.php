<?php

    namespace App\Services;

    class Service
    {

        /**
         * Check If Value Exists
         *
         * @param $value
         * @return bool
         */
        protected function hasValue($value)
        {
            return !!$value;
        }

        /**
         * Has At Least One
         *
         * @param $value1
         * @param $value2
         * @return bool
         */
        public function hasLeastOne($value1, $value2)
        {
            return ($value1 || $value2);
        }
    }
