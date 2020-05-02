<?php

    use App\Models\Claims\Claim;
    use Carbon\Carbon;
    use Illuminate\Database\Seeder;

    class Claims2Seeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $damage_types = ['Storm', 'Sand', 'Hail'];

            $contracts = \App\Models\Contracts\Contract::all()->pluck('id')->toArray();

            $areas = \App\Models\Areas\Area::all()->pluck('id')->toArray();

            /**
             * Null At the moment
             */
            $statuses = \App\Models\Claims\Statuses\ClaimStatus::all()->pluck('id')->toArray();

            $chief_assessors = \App\Models\Users\User::all()->pluck('id')->toArray();

            $manager_assessors = \App\Models\Users\User::all()->pluck('id')->toArray();

            for ($i = 0; $i < 500; $i++) {
                Claim::create([
                    'external_id'     => 'TEST000' . $i,
                    'external_system' => 'SEEDS',
                    'happened_at'     => Carbon::now()->subDays(rand(1, 20)),
                    'created_at'      => Carbon::now()->subDays(rand(1, 20)),
                    'contract_number' => (string)rand(210680002, 210690002),
                    'damage_type'     => $damage_types[rand(0, 2)],

                    'chief_assessor_id'   => $chief_assessors[array_rand($chief_assessors)],
                    'manager_assessor_id' => $manager_assessors[array_rand($manager_assessors)],
                    'contract_id'         => $contracts[array_rand($contracts)],
                    'area_id'             => $areas[array_rand($areas)],
                    'status_id'           => null,
                ]);
            }
        }
    }
