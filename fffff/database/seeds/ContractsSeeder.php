<?php
    
    use App\Models\Contracts\Contract;
    use Illuminate\Database\Seeder;

    class ContractsSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            Contract::create([
                'id'                        => 1,
                'contract_number'           => '210680001',
                'offer'                     => 'GRELE',
                'product'                   => 'GRELE_VIGNE',
                'deductible_hazards_option' => NULL,
                'deductible_hail_option'    => 'parcelle',
                'option1'                   => 'nein',
                'option2'                   => 'nein',
                'note'                      => NULL,
                'customer_id'               => 1,
                'agent_id'                  => 2
            ]);


            Contract::create([
                'id'                        => 2,
                'contract_number'           => '200004001',
                'offer'                     => 'MRC',
                'product'                   => 'MRC_GRANDES_CULT',
                'deductible_hazards_option' => 'F30/S30',
                'deductible_hail_option'    => 'parcelle',
                'option1'                   => 'ja',
                'option2'                   => 'ja',
                'note'                      => 'ID AXA : 0030288040700087',
                'customer_id'               => 3,
                'agent_id'                  => 4
            ]);


            Contract::create([
                'id'                        => 3,
                'contract_number'           => '200000001',
                'offer'                     => 'GRELE',
                'product'                   => 'GRELE_CULT_AGRICOLES',
                'deductible_hazards_option' => NULL,
                'deductible_hail_option'    => 'parcelle',
                'option1'                   => 'nein',
                'option2'                   => NULL,
                'note'                      => 'ID AXA : 0000000789340604',
                'customer_id'               => 5,
                'agent_id'                  => 6
            ]);


            Contract::create([
                'id'                        => 4,
                'contract_number'           => '207419001',
                'offer'                     => 'MRC',
                'product'                   => 'MRC_GRANDES_CULT',
                'deductible_hazards_option' => 'F30/S30',
                'deductible_hail_option'    => 'parcelle',
                'option1'                   => 'ja',
                'option2'                   => 'ja',
                'note'                      => 'ID AXA : 0000006347664104',
                'customer_id'               => 7,
                'agent_id'                  => 8
            ]);


        }
    }
