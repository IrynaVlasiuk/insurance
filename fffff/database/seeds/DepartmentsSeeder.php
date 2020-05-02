<?php

    use App\Models\Areas\Departments\Department;
    use Illuminate\Database\Seeder;

    class DepartmentsSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            Department::create([
                'id'   => 1,
                'code' => '01',
                'name' => 'AIN',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 2,
                'code' => '02',
                'name' => 'AISNE',
                'area_id' => 1
            ]);

            Department::create([
                'id'   => 3,
                'code' => '03',
                'name' => 'ALLIER',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 4,
                'code' => '04',
                'name' => 'ALPES DE HAUTES PROVENCE',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 5,
                'code' => '05',
                'name' => 'HAUTES ALPES',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 6,
                'code' => '06',
                'name' => 'ALPES-MARITIMES',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 7,
                'code' => '07',
                'name' => 'ARDECHE',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 8,
                'code' => '08',
                'name' => 'ARDENNES',
                'area_id' => 1
            ]);

            Department::create([
                'id'   => 9,
                'code' => '09',
                'name' => 'ARIEGE',
                'area_id' => 3
            ]);

            Department::create([
                'id'   => 10,
                'code' => '10',
                'name' => 'AUBE',
                'area_id' => 1
            ]);

            Department::create([
                'id'   => 11,
                'code' => '11',
                'name' => 'AUDE',
                'area_id' => 3
            ]);

            Department::create([
                'id'   => 12,
                'code' => '12',
                'name' => 'AVEYRON',
                'area_id' => 3
            ]);

            Department::create([
                'id'   => 13,
                'code' => '13',
                'name' => 'BOUCHES DU RHONE',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 14,
                'code' => '14',
                'name' => 'CALVADOS',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 15,
                'code' => '15',
                'name' => 'CANTAL',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 16,
                'code' => '16',
                'name' => 'CHARENTE',
                'area_id' => 3
            ]);

            Department::create([
                'id'   => 17,
                'code' => '17',
                'name' => 'CHARENTE MARITIME',
                'area_id' => 3
            ]);

            Department::create([
                'id'   => 18,
                'code' => '18',
                'name' => 'CHER',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 19,
                'code' => '19',
                'name' => 'CORREZE',
                'area_id' => 3
            ]);

            Department::create([
                'id'   => 21,
                'code' => '21',
                'name' => 'COTE D',
                'area_id' => 3,
            ]);

            Department::create([
                'id'   => 22,
                'code' => '22',
                'name' => 'COTE D',
                'area_id' => 4,
            ]);

            Department::create([
                'id'   => 23,
                'code' => '23',
                'name' => 'CREUSE',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 24,
                'code' => '24',
                'name' => 'DORDOGNE',
                'area_id' => 3
            ]);

            Department::create([
                'id'   => 25,
                'code' => '25',
                'name' => 'DOUBS',
                'area_id' => 4
            ]);

            Department::create([
                'id'   => 26,
                'code' => '26',
                'name' => 'DROME',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 27,
                'code' => '27',
                'name' => 'EURE',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 28,
                'code' => '28',
                'name' => 'EURE ET LOIR',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 29,
                'code' => '29',
                'name' => 'FINISTERE',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 30,
                'code' => '30',
                'name' => 'GARD',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 31,
                'code' => '31',
                'name' => 'HAUTE GARONNE',
                'area_id' => 3
            ]);

            Department::create([
                'id'   => 32,
                'code' => '32',
                'name' => 'GERS',
                'area_id' => 3
            ]);

            Department::create([
                'id'   => 33,
                'code' => '33',
                'name' => 'GIRONDE',
                'area_id' => 3
            ]);

            Department::create([
                'id'   => 34,
                'code' => '34',
                'name' => 'HERAULT',
                'area_id' => 3
            ]);

            Department::create([
                'id'   => 35,
                'code' => '35',
                'name' => 'ILLE ET VILAINE',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 36,
                'code' => '36',
                'name' => 'INDRE',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 37,
                'code' => '37',
                'name' => 'INDRE ET LOIRE',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 38,
                'code' => '38',
                'name' => 'ISERE',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 39,
                'code' => '39',
                'name' => 'JURA',
                'area_id' => 4
            ]);

            Department::create([
                'id'   => 40,
                'code' => '40',
                'name' => 'LANDES',
                'area_id' => 3
            ]);

            Department::create([
                'id'   => 41,
                'code' => '41',
                'name' => 'LOIR ET CHER',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 42,
                'code' => '42',
                'name' => 'LOIRE',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 43,
                'code' => '43',
                'name' => 'HAUTE LOIRE',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 44,
                'code' => '44',
                'name' => 'LOIRE ATLANTIQUE',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 45,
                'code' => '45',
                'name' => 'LOIRET',
                'area_id' => 4
            ]);

            Department::create([
                'id'   => 46,
                'code' => '46',
                'name' => 'LOT',
                'area_id' => 3
            ]);

            Department::create([
                'id'   => 47,
                'code' => '47',
                'name' => 'LOT ET GARONNE',
                'area_id' => 3
            ]);

            Department::create([
                'id'   => 48,
                'code' => '48',
                'name' => 'LOZERE',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 49,
                'code' => '49',
                'name' => 'MAINE ET LOIRE',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 50,
                'code' => '50',
                'name' => 'MANCHE',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 51,
                'code' => '51',
                'name' => 'MARNE',
                'area_id' => 1
            ]);

            Department::create([
                'id'   => 52,
                'code' => '52',
                'name' => 'HAUTE MARNE',
                'area_id' => 4
            ]);

            Department::create([
                'id'   => 53,
                'code' => '53',
                'name' => 'MAYENNE',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 54,
                'code' => '54',
                'name' => 'MEURTHE ET MOSELLE',
                'area_id' => 4
            ]);

            Department::create([
                'id'   => 55,
                'code' => '55',
                'name' => 'MEUSE',
                'area_id' => 4
            ]);

            Department::create([
                'id'   => 56,
                'code' => '56',
                'name' => 'MORBIHAN',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 57,
                'code' => '57',
                'name' => 'MOSELLE',
                'area_id' => 4
            ]);

            Department::create([
                'id'   => 58,
                'code' => '58',
                'name' => 'NIEVRE',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 59,
                'code' => '59',
                'name' => 'NORD',
                'area_id' => 1
            ]);

            Department::create([
                'id'   => 60,
                'code' => '60',
                'name' => 'OISE',
                'area_id' => 1
            ]);

            Department::create([
                'id'   => 61,
                'code' => '61',
                'name' => 'ORNE',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 62,
                'code' => '62',
                'name' => 'PAS DE CALAIS',
                'area_id' => 1
            ]);

            Department::create([
                'id'   => 63,
                'code' => '63',
                'name' => 'PUY DE DOME',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 64,
                'code' => '64',
                'name' => 'PYRENEES ATLANTIQUES',
                'area_id' => 3
            ]);

            Department::create([
                'id'   => 65,
                'code' => '65',
                'name' => 'HAUTES PYRENEES',
                'area_id' => 3
            ]);

            Department::create([
                'id'   => 66,
                'code' => '66',
                'name' => 'PYRENEES ORIENTALES',
                'area_id' => 3
            ]);

            Department::create([
                'id'   => 67,
                'code' => '67',
                'name' => 'BAS-RHIN',
                'area_id' => 4
            ]);

            Department::create([
                'id'   => 68,
                'code' => '68',
                'name' => 'HAUT-RHIN',
                'area_id' => 4
            ]);

            Department::create([
                'id'   => 69,
                'code' => '69',
                'name' => 'RHONE',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 70,
                'code' => '70',
                'name' => 'HAUTE SAONE',
                'area_id' => 4
            ]);

            Department::create([
                'id'   => 71,
                'code' => '71',
                'name' => 'SAONE ET LOIRE',
                'area_id' => 4
            ]);

            Department::create([
                'id'   => 72,
                'code' => '72',
                'name' => 'SARTHE',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 73,
                'code' => '73',
                'name' => 'SAVOIE',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 74,
                'code' => '74',
                'name' => 'HAUTE SAVOIE',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 75,
                'code' => '75',
                'name' => 'PARIS',
                'area_id' => 1
            ]);

            Department::create([
                'id'   => 76,
                'code' => '76',
                'name' => 'SEINE MARITIME',
                'area_id' => 1
            ]);

            Department::create([
                'id'   => 77,
                'code' => '77',
                'name' => 'SEINE ET MARNE',
                'area_id' => 1
            ]);

            Department::create([
                'id'   => 78,
                'code' => '78',
                'name' => 'YVELINES',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 79,
                'code' => '79',
                'name' => 'DEUX SEVRES',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 80,
                'code' => '80',
                'name' => 'SOMMES',
                'area_id' => 1
            ]);

            Department::create([
                'id'   => 81,
                'code' => '81',
                'name' => 'TARN',
                'area_id' => 3
            ]);

            Department::create([
                'id'   => 82,
                'code' => '82',
                'name' => 'TARN ET GARONNE',
                'area_id' => 3
            ]);

            Department::create([
                'id'   => 83,
                'code' => '83',
                'name' => 'VAR',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 84,
                'code' => '84',
                'name' => 'VAUCLUSE',
                'area_id' => 5
            ]);

            Department::create([
                'id'   => 85,
                'code' => '85',
                'name' => 'VENDÉE',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 86,
                'code' => '86',
                'name' => 'VIENNE',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 87,
                'code' => '87',
                'name' => 'HAUTE VIENNE',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 88,
                'code' => '88',
                'name' => 'VOSGES',
                'area_id' => 4
            ]);

            Department::create([
                'id'   => 89,
                'code' => '89',
                'name' => 'YONNE',
                'area_id' => 4
            ]);

            Department::create([
                'id'   => 90,
                'code' => '90',
                'name' => 'TERRITOIRE DE BELFORT',
                'area_id' => 4
            ]);

            Department::create([
                'id'   => 91,
                'code' => '91',
                'name' => 'ESSONNE',
                'area_id' => 2
            ]);

            Department::create([
                'id'   => 92,
                'code' => '92',
                'name' => 'HAUTS DE SEINE',
                'area_id' => 1
            ]);

            Department::create([
                'id'   => 93,
                'code' => '93',
                'name' => 'SEINE SAINT DENIS',
                'area_id' => 1
            ]);

            Department::create([
                'id'   => 94,
                'code' => '94',
                'name' => 'VAL DE MARNE',
                'area_id' => 1
            ]);

            Department::create([
                'id'   => 95,
                'code' => '95',
                'name' => 'VAL D',
                'area_id' => 1,
            ]);
        }
    }
