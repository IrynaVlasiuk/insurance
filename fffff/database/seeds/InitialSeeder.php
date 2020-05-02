<?php

    use Illuminate\Database\Seeder;

    class InitialSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            DB::table('tier_types')->insert([
                ['id' => 1, 'name' => 'client', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                ['id' => 2, 'name' => 'agent', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ]);
        }
    }
