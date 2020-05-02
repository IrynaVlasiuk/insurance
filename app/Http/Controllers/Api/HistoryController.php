<?php

    namespace App\Http\Controllers\Api;


    use App\Http\Controllers\Controller;
    use App\Models\History\HistoryRecord;

    class HistoryController extends Controller
    {

        /**
         * Get History Records
         * @return HistoryRecord[]|\Illuminate\Database\Eloquent\Collection
         */
        public function index()
        {
            return HistoryRecord::all();
        }
    }
