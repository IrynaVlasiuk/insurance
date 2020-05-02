<?php

    namespace App\Services\Import;

    use App\Models\Areas\Area;
    use App\Models\Areas\Departments\Department;
    use App\Models\Claims\Claim;
    use App\Models\Contracts\Contract;
    use App\Models\Tiers\Agent;
    use App\Models\Tiers\Customer;
    use App\Services\Service;
    use DB;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Log;

    class ContractImportService extends Service
    {


        public function import(Request $request)
        {
            try {
//                DB::beginTransaction();

                foreach (json_decode($request->data) as $entry) {
                    $this->processImportEntry((array)$entry);
                }
//                DB::commit();
            } catch (\Exception $e) {
//                DB::rollBack();
                throw new \Exception($e);
            }

        }

        private function processImportEntry($entry)
        {

            $customer = $this->findOrCreateCustomer($entry);
            $agent = $this->findOrCreateAgent($entry);


            if (!$contract = Contract::where('contract_number', $entry['contract_number'])->first()) {
                $contract = Contract::create([
                    'contract_number'           => $entry['contract_number'],
                    'offer'                     => $entry['offer'],
                    'product'                   => $entry['product'],
                    'deductible_hazards_option' => $entry['deductible_hazards_option'] ?? null,
                    'deductible_hail_option'    => $entry['deductible_hail_option'] ?? null,
                    'option1'                   => $entry['option1'] ?? null,
                    'option2'                   => $entry['option2'] ?? null,
                    'clauses'                   => $entry['clauses'] ?? null,
                    'note'                      => $entry['note'] ?? null,
                    'insee'                     => $entry['insee'] ?? null,
                    'customer_id'               => $customer->id,
                    'agent_id'                  => $agent->id,
                ]);
            }

            if ($claim = Claim::where('contract_number', $entry['contract_number'])->first()) {
                $claim->contract_id = $contract->id;
                $claim->insee = $entry['insee'];
                $claim->save();
            };
        }

        private function findOrCreateAgent($entry)
        {
            $agent = Agent::whereCode($entry['agent_code'])->first();

            if (!$agent) {
                $agent = Agent::create(
                    [
                        'firstname' => $entry['agent_firstname'] ?? null,
                        'lastname'  => $entry['agent_lastname'] ?? null,
                        'company'   => $entry['agent_company'] ?? null,
                        'address1'  => $entry['agent_address1'] ?? null,
                        'address2'  => $entry['agent_address2'] ?? null,
                        'zipcode'   => $entry['agent_zipcode'] ?? null,
                        'city'      => $entry['agent_city'] ?? null,
                        'landline'  => $entry['agent_landline'] ?? null,
                        'mobile'    => $entry['agent_mobile'] ?? null,
                        'fax'       => $entry['agent_fax'] ?? null,
                        'email'     => $entry['agent_email'] ?? null,
                        'code'      => $entry['agent_code'] ?? null,
                    ]
                );
            }

            return $agent;
        }

        private function findOrCreateCustomer($entry)
        {
            $customer = Customer::whereCode($entry['customer_code'])->first();

            if (!$customer) {
                $customer = Customer::create(
                    [
                        'firstname' => $entry['customer_firstname'] ?? null,
                        'lastname'  => $entry['customer_lastname'] ?? null,
                        'company'   => $entry['customer_company'] ?? null,
                        'address1'  => $entry['customer_address1'] ?? null,
                        'address2'  => $entry['customer_address2'] ?? null,
                        'zipcode'   => $entry['customer_zipcode'] ?? null,
                        'city'      => $entry['customer_city'] ?? null,
                        'landline'  => $entry['customer_landline'] ?? null,
                        'mobile'    => $entry['customer_mobile'] ?? null,
                        'fax'       => $entry['customer_fax'] ?? null,
                        'email'     => $entry['customer_email'] ?? null,
                        'code'      => $entry['customer_code'] ?? null,
                    ]
                );
            }

            return $customer;
        }

    }
