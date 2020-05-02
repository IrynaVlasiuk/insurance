<?php

    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run()
        {
            $this->call(UserTypesSeeder::class);
            $this->call(UserScopesSeeder::class);
            $this->call(TierTypesSeeder::class);
            $this->call(TiersSeeder::class);
            $this->call(AreasSeeder::class);
            $this->call(DepartmentsSeeder::class);
            $this->call(UsersSeeder::class);
            $this->call(ContractsSeeder::class);
            $this->call(ClaimsSeeder::class);
            $this->call(ClaimPlotsSeeder::class);
        }
    }
