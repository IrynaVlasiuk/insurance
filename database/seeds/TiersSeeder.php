<?php

    use App\Models\Tiers\Tier;
    use Illuminate\Database\Seeder;

    class TiersSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            Tier::create([
                'id'        => 1,
                'firstname' => 'CHRISTOPHE',
                'lastname'  => 'GERARDIN',
                'company'   => 'SCEA CHRISTOPHE GERARDIN',
                'address1'  => '24 RUE SAINTE GENEVIEVE',
                'address2'  => '',
                'zipcode'   => '51300',
                'city'      => 'Vitry-en-Perthois',
                'landline'  => '',
                'mobile'    => '',
                'fax'       => '',
                'email'     => '',
                'type_id'      => 1
            ]);


            Tier::create([
                'id'        => 2,
                'firstname' => 'FRANCK',
                'lastname'  => 'DUBOIS',
                'company'   => 'M. DUBOIS FRANCK (0052024144)',
                'address1'  => ' RESIDENCE FORT CARRE',
                'address2'  => '35 R MAL DELATTRE DE TASSIGNY',
                'zipcode'   => '52100',
                'city'      => 'SAINT DIZIER',
                'landline'  => '03 25 56 19 75 ',
                'mobile'    => '',
                'fax'       => '03 25 56 19 50 ',
                'email'     => 'AGENCE.FRANCKDUBOIS@AXA.FR',
                'type_id'      => 2
            ]);


            Tier::create([
                'id'        => 3,
                'firstname' => 'VINCENT',
                'lastname'  => 'ARMAND',
                'company'   => 'EARL ARMAND',
                'address1'  => '17 ROUTE D',
                'address2'  => 'HAUTION',
                'zipcode'   => '',
                'city'      => '2260',
                'landline'  => 'ST ALGIS',
                'mobile'    => '03 23 97 42 97 ',
                'fax'       => '',
                'email'     => '',
                'type_id'      => 1
            ]);


            Tier::create([
                'id'        => 4,
                'firstname' => 'GILLES',
                'lastname'  => 'VERHEECKE',
                'company'   => 'M. VERHEECKE GILLES (0002011244)',
                'address1'  => ' 5 RUE DU GAL LECLERC',
                'address2'  => '',
                'zipcode'   => '2140',
                'city'      => 'VERVINS',
                'landline'  => '03 23 98 07 00 ',
                'mobile'    => '',
                'fax'       => '03 23 98 31 79 ',
                'email'     => 'AGENCE.KAVER@AXA.FR',
                'type_id'      => 2
            ]);


            Tier::create([
                'id'        => 5,
                'firstname' => '',
                'lastname'  => '',
                'company'   => 'M. GOLISSET GERARD',
                'address1'  => '3 ROUTE DE VAUX',
                'address2'  => '',
                'zipcode'   => '77710',
                'city'      => 'VILLEBEON',
                'landline'  => '01 64 31 54 20 ',
                'mobile'    => '06 06 89 27 44 ',
                'fax'       => '',
                'email'     => '',
                'type_id'      => 1
            ]);


            Tier::create([
                'id'        => 6,
                'firstname' => 'SEVERINE',
                'lastname'  => 'MARCHAND LOUVET',
                'company'   => 'MME MARCHAND LOUVET SEVERINE (0089015144)',
                'address1'  => ' 7 ET 9 RUE VICTOR GUICHARD',
                'address2'  => '',
                'zipcode'   => '89100',
                'city'      => 'SENS',
                'landline'  => '03 86 65 06 01 ',
                'mobile'    => '',
                'fax'       => '03 86 95 98 04 ',
                'email'     => 'AGENCE.SEVERINELOUVET@AXA.FR',
                'type_id'      => 2
            ]);


            Tier::create([
                'id'        => 7,
                'firstname' => '',
                'lastname'  => '',
                'company'   => 'EARL DE LA PETITE PLAINE',
                'address1'  => '13 GRANDE RUE',
                'address2'  => '',
                'zipcode'   => '55210',
                'city'      => 'AVILLERS STE CROIX',
                'landline'  => '',
                'mobile'    => '06 76 97 43 23 ',
                'fax'       => '',
                'email'     => 'AUD.HENNEBERT@GMAIL.COM',
                'type_id'      => 1
            ]);


            Tier::create([
                'id'        => 8,
                'firstname' => 'EMERIC',
                'lastname'  => 'SCHUMAN',
                'company'   => 'EIRL SCHUMAN EMERIC (0054075044)',
                'address1'  => ' 4 RUE DE LA POTERNE',
                'address2'  => '',
                'zipcode'   => '54150',
                'city'      => 'BRIEY',
                'landline'  => '03 82 46 10 06 ',
                'mobile'    => '',
                'fax'       => '03 82 20 90 75 ',
                'email'     => 'AGENCE.SCHUMAN@AXA.FR',
                'type_id'      => 2
            ]);


        }
    }
