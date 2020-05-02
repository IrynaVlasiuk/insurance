<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Models\Contracts\Contract;
    use App\Models\Users\User;

    /**
     * Class ContractController
     *
     * @package App\Http\Controllers\Api
     */
    class ContractController extends Controller
    {

        /**
         * Get Contracts
         *
         * @return Contract[]|\Illuminate\Database\Eloquent\Collection
         */
        public function index()
        {
            return Contract::paginate($this->paginationRecordsAmount);
        }

        /**
         * Get Contract
         *
         * @param Contract $contract
         * @return mixed
         */
        public function show(Contract $contract)
        {
            $contract = $contract->load('claims','claims.claim_plots');

            foreach ($contract->claims as $claim) {
                if (!$claim->userHasAccess()) {
                    return response()->json(false, 403);
                };
            }

            return $contract;
        }

        /**
         * Get Contract Claims
         *
         * @param Contract $contract
         * @return mixed
         */
        public function getContractClaims(Contract $contract)
        {
            return $contract->claims->load('surveys','surveys.assistantAssessors');
        }

    }
