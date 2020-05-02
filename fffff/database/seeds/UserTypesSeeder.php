<?php
    
    use App\Models\Users\Types\UserType;
    use Illuminate\Database\Seeder;

    class UserTypesSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            Usertype::create([
                'id'   => 1,
                'name' => 'assessor'
            ]);


            Usertype::create([
                'id'   => 2,
                'name' => 'backoffice'
            ]);


            Usertype::create([
                'id'   => 3,
                'name' => 'admin'
            ]);


        }
    }
