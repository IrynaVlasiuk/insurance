<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Models\Users\User;

    /**
     * Class AssessorController
     *
     * @package App\Http\Controllers\Api
     */
    class AssessorController extends Controller
    {

        /**
         * @return User[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
         */
        public function getChiefAssessors()
        {
            return User::whereHas('chiefClaims')->get();
        }

        /**
         * @return User[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
         */
        public function getManagerAssessors()
        {
            return User::whereHas('managerClaims')->get();
        }
        
        /**
         * @return \Illuminate\Support\Collection
         */
        public function getChiefAssessorsDictionary()
        {
            return User::whereHas('chiefClaims')->get()->pluck('full_name', 'id');
        }

        /**
         * @return \Illuminate\Support\Collection
         */
        public function getManagerAssessorsDictionary()
        {
            return User::whereHas('managerClaims')->get()->pluck('full_name', 'id');
        }
    }
