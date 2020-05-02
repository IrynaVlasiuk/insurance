<?php

    use App\Models\Tiers\Types\TierType;
    use Illuminate\Database\Seeder;

    class TierTypesSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            Tiertype::create([
                'id'   => 1,
                'name' => 'customer'
            ]);


            Tiertype::create([
                'id'   => 2,
                'name' => 'agent'
            ]);
        }
    }
