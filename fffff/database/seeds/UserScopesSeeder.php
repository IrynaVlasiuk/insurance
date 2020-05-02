<?php

    use App\Models\Users\Scopes\UserScope;
    use Illuminate\Database\Seeder;

    class UserScopesSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            Userscope::create([
                'id'   => 1,
                'name' => 'Suisse Grêle'
            ]);


            Userscope::create([
                'id'   => 2,
                'name' => 'AXA'
            ]);
        }
    }
