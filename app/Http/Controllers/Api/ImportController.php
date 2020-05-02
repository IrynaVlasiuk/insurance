<?php

    namespace App\Http\Controllers\Api;


    use App\Http\Controllers\Controller;
    use App\Services\Import\ClaimImportService;
    use App\Services\Import\ContractImportService;
    use Illuminate\Http\Request;

    class ImportController extends Controller
    {


        public function importClaims(Request $request)
        {
            (new ClaimImportService())->import($request);
        }

        public function importContracts(Request $request)
        {
            (new ContractImportService())->import($request);
        }


    }
