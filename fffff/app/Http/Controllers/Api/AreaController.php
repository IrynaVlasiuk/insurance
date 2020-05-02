<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Models\Areas\Area;

    /**
     * Class AreaController
     * Area Management
     *
     * @package App\Http\Controllers\Api
     */
    class AreaController extends Controller
    {

        /**
         * Get Areas
         *
         * @return mixed
         */
        public function index()
        {
            return Area::all();
        }

        /**
         * Show Area
         * with Related
         *
         * @param Area $area
         * @return Area
         */
        public function show(Area $area)
        {
            return $area->load('areaManager','departments','assessors');
        }

        /**
         * Get Area Assessors
         *
         * @param Area $area
         * @return micdxed
         */
        public function getAreaAssessors(Area $area)
        {
            return $area->assessors;
        }

    }
