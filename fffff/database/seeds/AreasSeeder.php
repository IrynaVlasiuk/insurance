<?php
    
    use App\Models\Areas\Area;
    use Illuminate\Database\Seeder;

    class AreasSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            Area::create([
                'id'              => 1,
                'code'            => 'Z1',
                'name'            => 'Zone Nord',
                'area_manager_id' => NULL
            ]);


            Area::create([
                'id'              => 2,
                'code'            => 'Z2',
                'name'            => 'Zone Ouest',
                'area_manager_id' => NULL
            ]);


            Area::create([
                'id'              => 3,
                'code'            => 'Z3',
                'name'            => 'Zone Sud-Ouest',
                'area_manager_id' => NULL
            ]);


            Area::create([
                'id'              => 4,
                'code'            => 'Z4',
                'name'            => 'Zone Est',
                'area_manager_id' => NULL
            ]);


            Area::create([
                'id'              => 5,
                'code'            => 'Z5',
                'name'            => 'Zone Sud-Est',
                'area_manager_id' => NULL
            ]);
        }
    }
