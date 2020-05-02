<?php

    use App\Models\Users\User;
    use Illuminate\Database\Seeder;

    class UsersSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            User::create([
                'id'        => 1,
                'login'     => 'julien.vasseur@suissegrele.com',
                'firstname' => 'Julien',
                'lastname'  => 'Vasseur',
                'address1'  => '18Bis Rue Verte',
                'address2'  => NULL,
                'zipcode'   => '80250',
                'city'      => 'Grivesnes',
                'phone'     => '07 85 39 14 70',
                'email'     => 'julien.vasseur@suissegrele.com',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 1,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 2,
                'login'     => 'baptiste.mathias@suissegrele.com',
                'firstname' => 'Baptiste',
                'lastname'  => 'Mathias',
                'address1'  => '1 Les Petites Fleuveries',
                'address2'  => NULL,
                'zipcode'   => '28160',
                'city'      => 'Fraze',
                'phone'     => '06 45 87 28 73',
                'email'     => 'baptiste.mathias@suissegrele.com',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 2,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 3,
                'login'     => 'stephane.arricastres@suissegrele.com',
                'firstname' => 'Stéphane',
                'lastname'  => 'Arricastres',
                'address1'  => '8 Avenue Etienne',
                'address2'  => NULL,
                'zipcode'   => '64200',
                'city'      => 'Biarritz',
                'phone'     => '06 07 43 15 33',
                'email'     => 'stephane.arricastres@suissegrele.com',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 4,
                'login'     => 'thierry.chardin@suissegrele.com',
                'firstname' => 'Thierry',
                'lastname'  => 'Chardin',
                'address1'  => '16 impasse La Franchie',
                'address2'  => NULL,
                'zipcode'   => '45270',
                'city'      => 'Auvilliers',
                'phone'     => '06 63 52 69 14',
                'email'     => 'thierry.chardin@suissegrele.com',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 5,
                'login'     => 'guillaume.dubois@suissegrele.com',
                'firstname' => 'Guillaume',
                'lastname'  => 'Dubois',
                'address1'  => 'Les Gaillards',
                'address2'  => NULL,
                'zipcode'   => '18500',
                'city'      => 'Mehum S/Yèvre',
                'phone'     => '06 08 68 95 33',
                'email'     => 'guillaume.dubois@suissegrele.com',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 5,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 6,
                'login'     => 'gerald.berthier@gmail.com',
                'firstname' => 'Gérald',
                'lastname'  => 'Berthier',
                'address1'  => '108 rue de Thurey',
                'address2'  => NULL,
                'zipcode'   => '10180',
                'city'      => 'Saint Benoit S/Seine',
                'phone'     => '06 24 24 45 39',
                'email'     => 'gerald.berthier@gmail.com',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 1,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 7,
                'login'     => 'e.desousseaux@experts-fonciers.com',
                'firstname' => 'Eric',
                'lastname'  => 'Desrousseaux',
                'address1'  => '6 Place de lEglise',
                'address2'  => NULL,
                'zipcode'   => '80910',
                'city'      => 'ARVILLERS',
                'phone'     => '06 80 42 68 68',
                'email'     => 'e.desousseaux@experts-fonciers.com',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 1,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 8,
                'login'     => 'eric.davesne@wanadoo.fr',
                'firstname' => 'Eric',
                'lastname'  => 'DAVESNE',
                'address1'  => '2 Rue des Malots',
                'address2'  => NULL,
                'zipcode'   => '51120',
                'city'      => 'Peas',
                'phone'     => '06 80 58 39 34',
                'email'     => 'eric.davesne@wanadoo.fr',
                'type_id'      => 1,
                'scope_id'     => 2,
                'area_id'      => 1,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 9,
                'login'     => 'francois.deleau@wanadoo.fr',
                'firstname' => 'François',
                'lastname'  => 'Deleau',
                'address1'  => 'Ferme du Bois Quesnoy',
                'address2'  => NULL,
                'zipcode'   => '62130',
                'city'      => 'RAMECOURT',
                'phone'     => '07 86 29 35 84',
                'email'     => 'francois.deleau@wanadoo.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 1,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 10,
                'login'     => 'ducheminfabien@free.fr',
                'firstname' => 'Fabien',
                'lastname'  => 'Duchemin',
                'address1'  => '34 rue des Limonières',
                'address2'  => NULL,
                'zipcode'   => '51120',
                'city'      => 'Sézanne',
                'phone'     => '06 86 85 48 62',
                'email'     => 'ducheminfabien@free.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 1,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 11,
                'login'     => 'HenryPierre51@gmail.com',
                'firstname' => 'Pierre Marc',
                'lastname'  => 'Henry',
                'address1'  => '10 Grande Rue',
                'address2'  => NULL,
                'zipcode'   => '51240',
                'city'      => 'Cernon',
                'phone'     => '06 64 28 44 51',
                'email'     => 'HenryPierre51@gmail.com',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 1,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 12,
                'login'     => 'meriot.francois@bbox.fr',
                'firstname' => 'François',
                'lastname'  => 'Meriot',
                'address1'  => '12 rue de la Vilette',
                'address2'  => NULL,
                'zipcode'   => '51490',
                'city'      => 'Beine Nauroy',
                'phone'     => '06 81 77 15 49',
                'email'     => 'meriot.francois@bbox.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 1,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 13,
                'login'     => 'passe.bruno@orange.fr',
                'firstname' => 'Bruno',
                'lastname'  => 'Passé',
                'address1'  => '1 rue des Ormes',
                'address2'  => NULL,
                'zipcode'   => '10200',
                'city'      => 'Maisons les Soulaines',
                'phone'     => '06 81 18 73 70',
                'email'     => 'passe.bruno@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 1,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 14,
                'login'     => 'rouyerpascal@orange.fr',
                'firstname' => 'Pascal',
                'lastname'  => 'ROUYER',
                'address1'  => '2 Route de la Ville aux Bois',
                'address2'  => NULL,
                'zipcode'   => '10140',
                'city'      => 'Amance',
                'phone'     => '06 09 51 69 59',
                'email'     => 'rouyerpascal@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 2,
                'area_id'      => 1,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 15,
                'login'     => 'expert.vandeputte@gmail.com',
                'firstname' => 'Eric',
                'lastname'  => 'VAN DE PUTTE',
                'address1'  => 'Ferme du Paradis',
                'address2'  => NULL,
                'zipcode'   => '95420',
                'city'      => 'Genainville',
                'phone'     => '06 60 43 61 00',
                'email'     => 'expert.vandeputte@gmail.com',
                'type_id'      => 1,
                'scope_id'     => 2,
                'area_id'      => 1,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 16,
                'login'     => 'bernauber49@gmail.com',
                'firstname' => 'Bernard',
                'lastname'  => 'Auber',
                'address1'  => '26 rue Primevère',
                'address2'  => NULL,
                'zipcode'   => '49080',
                'city'      => 'Bouchemaine',
                'phone'     => '06 81 82 24 39',
                'email'     => 'bernauber49@gmail.com',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 2,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 17,
                'login'     => 'barbec28d@gmail.com',
                'firstname' => 'Christophe',
                'lastname'  => 'Barbe',
                'address1'  => '10 Rue des Chariots',
                'address2'  => NULL,
                'zipcode'   => '28500',
                'city'      => 'Boissy en Drouais',
                'phone'     => '06 80 33 50 71',
                'email'     => 'barbec28d@gmail.com',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 2,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 18,
                'login'     => 'belley.stephane@orange.fr',
                'firstname' => 'Stéphane',
                'lastname'  => 'Belley',
                'address1'  => '4 Rue de Simplé',
                'address2'  => NULL,
                'zipcode'   => '53360',
                'city'      => 'Peuton',
                'phone'     => '06 89 29 39 18',
                'email'     => 'belley.stephane@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 2,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 19,
                'login'     => 'g.conscience@laposte.net',
                'firstname' => 'Gilles',
                'lastname'  => 'Conscience',
                'address1'  => '12 rue de la Font',
                'address2'  => 'Le Vivier',
                'zipcode'   => '36200',
                'city'      => 'Le Pechereau',
                'phone'     => '06 74 99 17 94',
                'email'     => 'g.conscience@laposte.net',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 2,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 20,
                'login'     => 'audrenne.lelievre@orange.fr',
                'firstname' => 'Arnaud',
                'lastname'  => 'Lelievre',
                'address1'  => 'Brives',
                'address2'  => NULL,
                'zipcode'   => '53440',
                'city'      => 'Belgeard',
                'phone'     => '06 75 05 19 34',
                'email'     => 'audrenne.lelievre@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 2,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 21,
                'login'     => 'moreau.gilles-61@orange.fr',
                'firstname' => 'Gilles',
                'lastname'  => 'Moreau',
                'address1'  => 'Le Bourg',
                'address2'  => NULL,
                'zipcode'   => '61130',
                'city'      => 'Dame Marie',
                'phone'     => '06 40 75 18 20',
                'email'     => 'moreau.gilles-61@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 2,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 22,
                'login'     => 'pasquier.earl@orange.fr',
                'firstname' => 'Philippe',
                'lastname'  => 'Pasquier',
                'address1'  => 'Le Gros Buisson',
                'address2'  => NULL,
                'zipcode'   => '86240',
                'city'      => 'Iteuil',
                'phone'     => '06 76 97 12 12',
                'email'     => 'pasquier.earl@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 2,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 23,
                'login'     => 'vernonpatrick@wanadoo.fr',
                'firstname' => 'Patrick',
                'lastname'  => 'Vernon',
                'address1'  => 'La Furaudière',
                'address2'  => NULL,
                'zipcode'   => '41190',
                'city'      => 'Santenay',
                'phone'     => '06 86 85 59 35',
                'email'     => 'vernonpatrick@wanadoo.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 2,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 24,
                'login'     => 'valeriebailly@free.fr',
                'firstname' => 'Valérie',
                'lastname'  => 'Bailly',
                'address1'  => '4 Passage Bellevue',
                'address2'  => NULL,
                'zipcode'   => '64200',
                'city'      => 'Biarritz',
                'phone'     => '06 25 31 64 78',
                'email'     => 'valeriebailly@free.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 25,
                'login'     => 'francis.barraud@neuf.fr',
                'firstname' => 'Francis',
                'lastname'  => 'Barraud',
                'address1'  => 'Route de Chef-Boutonne',
                'address2'  => NULL,
                'zipcode'   => '16240',
                'city'      => 'Villefagnan',
                'phone'     => '06 73 56 74 73',
                'email'     => 'francis.barraud@neuf.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 26,
                'login'     => 'sylvainbille17@orange.fr',
                'firstname' => 'Sylvain',
                'lastname'  => 'BILLE',
                'address1'  => '7, le Logis de la Finalière',
                'address2'  => NULL,
                'zipcode'   => '17430',
                'city'      => 'Saint Coutant le Grand',
                'phone'     => '06 18 29 64 17',
                'email'     => 'sylvainbille17@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 27,
                'login'     => 'pierre-jean.bitaube@orange.fr',
                'firstname' => 'Pierre-Jean',
                'lastname'  => 'Bitaubé',
                'address1'  => 'Labroue',
                'address2'  => NULL,
                'zipcode'   => '47160',
                'city'      => 'Buzet Sur Baïze',
                'phone'     => '06 87 21 61 61',
                'email'     => 'pierre-jean.bitaube@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 28,
                'login'     => 'valentinboinard@laposte.net',
                'firstname' => 'Valentin',
                'lastname'  => 'Boinard',
                'address1'  => '1 Hameau Chez Maquillon',
                'address2'  => NULL,
                'zipcode'   => '17260',
                'city'      => 'Saint Andréde Lidon',
                'phone'     => '06 65 42 45 93',
                'email'     => 'valentinboinard@laposte.net',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 29,
                'login'     => 'chartiercedric@neuf.fr',
                'firstname' => 'Cédric',
                'lastname'  => 'Chartier',
                'address1'  => '24 Route de la mare',
                'address2'  => NULL,
                'zipcode'   => '17770',
                'city'      => 'Juicq',
                'phone'     => '06 63 38 45 92',
                'email'     => 'chartiercedric@neuf.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 30,
                'login'     => 'pineau.cognacles3c@free.fr',
                'firstname' => 'Cyril',
                'lastname'  => 'Chartier',
                'address1'  => '3 Rue de la Cure',
                'address2'  => NULL,
                'zipcode'   => '17770',
                'city'      => 'Juicq',
                'phone'     => '06 85 54 77 69',
                'email'     => 'pineau.cognacles3c@free.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 31,
                'login'     => 'latessonniere@hotmail.com',
                'firstname' => 'Cédric',
                'lastname'  => 'COLEMYN',
                'address1'  => '7 Route de la Lande',
                'address2'  => NULL,
                'zipcode'   => '33340',
                'city'      => 'Civrac en médoc',
                'phone'     => '06 65 53 72 96',
                'email'     => 'latessonniere@hotmail.com',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 32,
                'login'     => 'michel.coutet@gmail.com',
                'firstname' => 'Michel',
                'lastname'  => 'Coutet',
                'address1'  => 'Lagors',
                'address2'  => NULL,
                'zipcode'   => '32110',
                'city'      => 'Caupenne d',
                'phone'     => 'Armagnac',
                'email'     => '06 07 49 91 81',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 1,
             'password'  => Hash::make('123123'),
                ]);


            User::create([
                'id'        => 33,
                'login'     => 'espinasse.b@wanadoo.fr',
                'firstname' => 'Bruno',
                'lastname'  => 'ESPINASSE',
                'address1'  => 'Lorme',
                'address2'  => NULL,
                'zipcode'   => '47600',
                'city'      => 'Nérac',
                'phone'     => '06 77 10 67 62',
                'email'     => 'espinasse.b@wanadoo.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 34,
                'login'     => 'jj.ferron@wanadoo.fr',
                'firstname' => 'Jean-Jacques',
                'lastname'  => 'Ferron',
                'address1'  => '35 Avenue de la c7pe',
                'address2'  => NULL,
                'zipcode'   => '17390',
                'city'      => 'La Trmblade France',
                'phone'     => '06 80 57 20 05',
                'email'     => 'jj.ferron@wanadoo.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 35,
                'login'     => 'yannick.garras@gmail.com',
                'firstname' => 'Yannick',
                'lastname'  => 'Garras',
                'address1'  => '16 route de Guibert',
                'address2'  => NULL,
                'zipcode'   => '33760',
                'city'      => 'Frontenac',
                'phone'     => '06 09 71 35 55',
                'email'     => 'yannick.garras@gmail.com',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 36,
                'login'     => 'rgessler@gomaine-joy.com',
                'firstname' => 'Roland',
                'lastname'  => 'Gessler',
                'address1'  => 'Bordes',
                'address2'  => NULL,
                'zipcode'   => '32110',
                'city'      => 'Panjas',
                'phone'     => '06 82 83 21 13',
                'email'     => 'rgessler@gomaine-joy.com',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 37,
                'login'     => 'thierry.lavielle@wanadoo.fr',
                'firstname' => 'Thierry',
                'lastname'  => 'LAVIELLE',
                'address1'  => '1 Chemin de la Colline',
                'address2'  => NULL,
                'zipcode'   => '64150',
                'city'      => 'Lagor',
                'phone'     => '06 87 29 29 06',
                'email'     => 'thierry.lavielle@wanadoo.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 38,
                'login'     => 'jmlenier@sfr.fr',
                'firstname' => 'Jean-Marie',
                'lastname'  => 'Lénier',
                'address1'  => '8 bis rue Marcel Pagnol',
                'address2'  => NULL,
                'zipcode'   => '33660',
                'city'      => 'Saint-Seurin-Sur-l',
                'phone'     => 'Isle',
                'email'     => '06 16 98 27 44',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 1,
             'password'  => Hash::make('123123'),
                ]);


            User::create([
                'id'        => 39,
                'login'     => 'jpmartinma@orange.fr',
                'firstname' => 'Jean-Pierre',
                'lastname'  => 'Martin',
                'address1'  => 'les Moulières',
                'address2'  => NULL,
                'zipcode'   => '34780',
                'city'      => 'Lauroux',
                'phone'     => '06 82 58 67 81',
                'email'     => 'jpmartinma@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 40,
                'login'     => 'cahega@club-internet.fr',
                'firstname' => 'Jean Luc',
                'lastname'  => 'Monceaux',
                'address1'  => '5 Rue Binaud',
                'address2'  => 'CAHEGA SARL',
                'zipcode'   => '33300',
                'city'      => 'Bordeaux',
                'phone'     => '06 08 32 79 58',
                'email'     => 'cahega@club-internet.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 41,
                'login'     => 'pierre.paulycallot@sfr.fr',
                'firstname' => 'Pierre Jean',
                'lastname'  => 'Pauly Callot',
                'address1'  => '16 rue Pioceau',
                'address2'  => NULL,
                'zipcode'   => '33240',
                'city'      => 'Saint André de Cubzac',
                'phone'     => '06 14 47 08 32',
                'email'     => 'pierre.paulycallot@sfr.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 42,
                'login'     => '11ppratx@orange.fr',
                'firstname' => 'Pierre',
                'lastname'  => 'Pratx',
                'address1'  => 'Route de la Serpent',
                'address2'  => NULL,
                'zipcode'   => '11300',
                'city'      => 'Bouriège',
                'phone'     => '06 14 38 63 72',
                'email'     => '11ppratx@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 43,
                'login'     => 'stephaneservian@yahoo.fr',
                'firstname' => 'Stéphane',
                'lastname'  => 'Servian',
                'address1'  => '8 route de Madiran',
                'address2'  => NULL,
                'zipcode'   => '65700',
                'city'      => 'Lascazeres',
                'phone'     => '06 08 95 23 73',
                'email'     => 'stephaneservian@yahoo.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 44,
                'login'     => 'alain.viacroze@sfr.fr',
                'firstname' => 'Alain',
                'lastname'  => 'Viacroze',
                'address1'  => '16 rue Pablo Neruda',
                'address2'  => NULL,
                'zipcode'   => '17700',
                'city'      => 'Surgeres',
                'phone'     => '06 68 41 25 64',
                'email'     => 'alain.viacroze@sfr.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 45,
                'login'     => 'marcel.viaud91@orange.fr',
                'firstname' => 'Marcel',
                'lastname'  => 'Viaud',
                'address1'  => '2 rue de l',
                'address2'  => 'église',
                'zipcode'   => NULL,
                'city'      => '11140',
                'phone'     => 'Mérial',
                'email'     => '06 81 29 22 04',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 1,
             'password'  => Hash::make('123123'),
                ]);


            User::create([
                'id'        => 46,
                'login'     => '',
                'firstname' => 'Jean-pierre',
                'lastname'  => 'Villeneuve',
                'address1'  => 'Tuque de Gilis',
                'address2'  => NULL,
                'zipcode'   => '82150',
                'city'      => 'Saint Beauzeil',
                'phone'     => NULL,
                'email'     => 'test@gmail.com',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 47,
                'login'     => 'michelinevinet@orange.fr',
                'firstname' => 'Yannick',
                'lastname'  => 'Vinet',
                'address1'  => '11 impasse des Lauriers',
                'address2'  => NULL,
                'zipcode'   => '17400',
                'city'      => 'Mazeray',
                'phone'     => '06 82 92 08 09',
                'email'     => 'michelinevinet@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 3,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 48,
                'login'     => 'daniel.antoine@wanadoo.fr',
                'firstname' => 'Daniel',
                'lastname'  => 'Antoine',
                'address1'  => '8 rue Saint-Léger',
                'address2'  => NULL,
                'zipcode'   => '70200',
                'city'      => 'Vy-les-Lure',
                'phone'     => '06 78 19 53 18',
                'email'     => 'daniel.antoine@wanadoo.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 49,
                'login'     => 'arcaujo@yahoo.fr',
                'firstname' => 'Joël',
                'lastname'  => 'Aubertot',
                'address1'  => '8 rue Maison Paulin',
                'address2'  => NULL,
                'zipcode'   => '52210',
                'city'      => 'Arc-en-Barrois',
                'phone'     => '06 45 27 63 63',
                'email'     => 'arcaujo@yahoo.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 50,
                'login'     => 'guybarbier57@orange.fr',
                'firstname' => 'Guy',
                'lastname'  => 'Barbier',
                'address1'  => '123 rue Aux Loups',
                'address2'  => NULL,
                'zipcode'   => '57590',
                'city'      => 'Lucy',
                'phone'     => '06 82 13 26 53',
                'email'     => 'guybarbier57@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 51,
                'login'     => 'mireille.barthelemy@hotmail.fr',
                'firstname' => 'Philippe',
                'lastname'  => 'Barthélemy',
                'address1'  => '4 route de Mont les Etrelles',
                'address2'  => NULL,
                'zipcode'   => '70700',
                'city'      => 'Villers Chemin et Mont',
                'phone'     => '06 85 10 21 33',
                'email'     => 'mireille.barthelemy@hotmail.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 52,
                'login'     => 'ebaudier@terre-net.fr',
                'firstname' => 'Emmanuel',
                'lastname'  => 'BAUDIER',
                'address1'  => '11 Route des Malbuissons',
                'address2'  => NULL,
                'zipcode'   => '70700',
                'city'      => 'VELLECLAIRE',
                'phone'     => '06 83 31 05 22',
                'email'     => 'ebaudier@terre-net.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 53,
                'login'     => 'josianne.bollinger@sfr.fr',
                'firstname' => 'Jacky',
                'lastname'  => 'Bollinger',
                'address1'  => '28 rue de l',
                'address2'  => 'Espérance',
                'zipcode'   => NULL,
                'city'      => '68700',
                'phone'     => 'Uffholtz',
                'email'     => '06 34 90 14 86',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 1,
             'password'  => Hash::make('123123'),
                ]);


            User::create([
                'id'        => 54,
                'login'     => 'emile@be-services.fr',
                'firstname' => 'Emile',
                'lastname'  => 'Borsenberger',
                'address1'  => '31 A rue du Moulin',
                'address2'  => 'B.E. Services',
                'zipcode'   => '57720',
                'city'      => 'Epping-Urbach',
                'phone'     => '06 86 67 00 48',
                'email'     => 'emile@be-services.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 55,
                'login'     => 'richardchardin@orange.fr',
                'firstname' => 'Richard',
                'lastname'  => 'Chardin',
                'address1'  => 'Les Chanoines',
                'address2'  => NULL,
                'zipcode'   => '45230',
                'city'      => 'Saint Maurice s/Aveyron',
                'phone'     => '06 82 84 47 04',
                'email'     => 'richardchardin@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 56,
                'login'     => 'luc.chaudron@laposte.net',
                'firstname' => 'Luc',
                'lastname'  => 'Chaudron',
                'address1'  => '9 Rue de la voie du Bois',
                'address2'  => NULL,
                'zipcode'   => '55260',
                'city'      => 'Neuville en Verdunois',
                'phone'     => '06 78 76 56 75',
                'email'     => 'luc.chaudron@laposte.net',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 57,
                'login'     => 'dietrich.michel@wanadoo.fr',
                'firstname' => 'Michel',
                'lastname'  => 'Dietrich',
                'address1'  => '3 rue des Ours',
                'address2'  => NULL,
                'zipcode'   => '67650',
                'city'      => 'Dambach la Ville',
                'phone'     => '06 08 98 77 58',
                'email'     => 'dietrich.michel@wanadoo.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 58,
                'login'     => 'dornieraurelien@yahoo.fr',
                'firstname' => 'Aurélien',
                'lastname'  => 'Dornier',
                'address1'  => '77 rue des 3 fontaines',
                'address2'  => NULL,
                'zipcode'   => '25520',
                'city'      => 'Bians les Usiers',
                'phone'     => '06 87 85 42 56',
                'email'     => 'dornieraurelien@yahoo.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 59,
                'login'     => 'jeang.dulac@hotmail.fr',
                'firstname' => 'Jean-Georges',
                'lastname'  => 'DULAC',
                'address1'  => '4 Rue de la Barre',
                'address2'  => NULL,
                'zipcode'   => '54290',
                'city'      => 'Gripport',
                'phone'     => '06 24 72 26 53',
                'email'     => 'jeang.dulac@hotmail.fr',
                'type_id'      => 1,
                'scope_id'     => 2,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 60,
                'login'     => 'thdt@neuf.fr',
                'firstname' => 'Thierry',
                'lastname'  => 'DUMONT',
                'address1'  => '8 route de Verdun',
                'address2'  => NULL,
                'zipcode'   => '54470',
                'city'      => 'Thiaucourt',
                'phone'     => '06 68 31 76 35',
                'email'     => 'thdt@neuf.fr',
                'type_id'      => 1,
                'scope_id'     => 2,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 61,
                'login'     => 'info@einhart.fr',
                'firstname' => 'Nicolas',
                'lastname'  => 'Einhart',
                'address1'  => '15 rue Principale',
                'address2'  => NULL,
                'zipcode'   => '67560',
                'city'      => 'Rosenwiller',
                'phone'     => '06 80 34 45 25',
                'email'     => 'info@einhart.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 62,
                'login'     => 'erhart.adr@free.fr ou erhart.adr@gmail.com',
                'firstname' => 'Adrien',
                'lastname'  => 'ERHART',
                'address1'  => '12 Rue Basse',
                'address2'  => NULL,
                'zipcode'   => '68440',
                'city'      => 'Bruebach',
                'phone'     => '06 84 04 11 14',
                'email'     => 'erhart.adr@free.fr ou erhart.adr@gmail.com',
                'type_id'      => 1,
                'scope_id'     => 2,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 63,
                'login'     => 'dominique.gallion@sfr.fr',
                'firstname' => 'Dominique',
                'lastname'  => 'Gallion',
                'address1'  => '71 Rue de Saint Menge',
                'address2'  => NULL,
                'zipcode'   => '52200',
                'city'      => 'Champigny les Langres',
                'phone'     => '06 83 76 06 83',
                'email'     => 'dominique.gallion@sfr.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 64,
                'login'     => 'georges.girardin@west-telecom.com',
                'firstname' => 'Georges',
                'lastname'  => 'Girardin',
                'address1'  => '1 bis jardin du Kerfy',
                'address2'  => NULL,
                'zipcode'   => '57340',
                'city'      => 'Dalhain',
                'phone'     => '06 80 70 81 30',
                'email'     => 'georges.girardin@west-telecom.com',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 65,
                'login'     => 'earl.gaby@wanadoo.fr',
                'firstname' => 'Christian',
                'lastname'  => 'Hamant',
                'address1'  => '11 rue Principale',
                'address2'  => NULL,
                'zipcode'   => '57170',
                'city'      => 'Obreck',
                'phone'     => '06 22 93 40 20',
                'email'     => 'earl.gaby@wanadoo.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 66,
                'login'     => 'jean.hick@wanadoo.fr',
                'firstname' => 'Jean-Lucien',
                'lastname'  => 'Hick',
                'address1'  => '8 rue Principale',
                'address2'  => NULL,
                'zipcode'   => '57260',
                'city'      => 'Rorbach-les-Dieuze',
                'phone'     => '06 73 48 14 90',
                'email'     => 'jean.hick@wanadoo.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 67,
                'login'     => 'sceajeser@orange.fr',
                'firstname' => 'Philippe',
                'lastname'  => 'Jeser',
                'address1'  => '37 rue du Château',
                'address2'  => NULL,
                'zipcode'   => '67140',
                'city'      => 'Zellwiller',
                'phone'     => '06 86 46 36 66',
                'email'     => 'sceajeser@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 68,
                'login'     => 'clementkoessler@orange.fr',
                'firstname' => 'Clément',
                'lastname'  => 'KOESSLER',
                'address1'  => '5 Place du Maréchal juin',
                'address2'  => NULL,
                'zipcode'   => '67370',
                'city'      => 'Griesheim sur Souffel',
                'phone'     => '06 30 91 80 46',
                'email'     => 'clementkoessler@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 2,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 69,
                'login'     => 'fabrice.michel1612@orange.fr',
                'firstname' => 'Fabrice',
                'lastname'  => 'Michel',
                'address1'  => '4 rue de Laborde',
                'address2'  => NULL,
                'zipcode'   => '39800',
                'city'      => 'Buvilly',
                'phone'     => '06 64 11 39 72',
                'email'     => 'fabrice.michel1612@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 70,
                'login'     => 'bertrandmousset@yahoo.fr',
                'firstname' => 'Bertrand',
                'lastname'  => 'Mousset',
                'address1'  => '395 Rue de la Madelle',
                'address2'  => NULL,
                'zipcode'   => '45520',
                'city'      => 'Chevilly',
                'phone'     => '07 78 90 90 53',
                'email'     => 'bertrandmousset@yahoo.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 71,
                'login'     => 'xavier.richard85@sfr.fr',
                'firstname' => 'Xavier',
                'lastname'  => 'Richard',
                'address1'  => '20 Rue Pierre Durand',
                'address2'  => NULL,
                'zipcode'   => '52200',
                'city'      => 'Champigny les Langres',
                'phone'     => '06 87 37 67 69',
                'email'     => 'xavier.richard85@sfr.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 72,
                'login'     => 'bernard@domainerion.fr',
                'firstname' => 'Bernard',
                'lastname'  => 'Rion',
                'address1'  => '8 Route Nationale',
                'address2'  => NULL,
                'zipcode'   => '21700',
                'city'      => 'Vosne Romanée',
                'phone'     => '07 86 31 31 80',
                'email'     => 'bernard@domainerion.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 73,
                'login'     => 'bonum-vinum@orange.fr',
                'firstname' => 'Dominique',
                'lastname'  => 'Roy',
                'address1'  => '2 Rue des Charmots',
                'address2'  => NULL,
                'zipcode'   => '21630',
                'city'      => 'Pommard',
                'phone'     => '06 08 46 57 48',
                'email'     => 'bonum-vinum@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 2,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 74,
                'login'     => 'c.royer0043@orange.fr',
                'firstname' => 'Cyrille',
                'lastname'  => 'Royer',
                'address1'  => '8 rue d',
                'address2'  => 'Humberville',
                'zipcode'   => NULL,
                'city'      => '52700',
                'phone'     => 'Saint-Blin',
                'email'     => '06 10 75 88 16',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 1,
             'password'  => Hash::make('123123'),
                ]);


            User::create([
                'id'        => 75,
                'login'     => 'marisa.schubnel@orange.fr',
                'firstname' => 'Martin',
                'lastname'  => 'Schubnel',
                'address1'  => '34 rue des Bergers',
                'address2'  => NULL,
                'zipcode'   => '67680',
                'city'      => 'Epfig',
                'phone'     => '06 70 30 80 28',
                'email'     => 'marisa.schubnel@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 76,
                'login'     => 'marc@vins-schueller.com',
                'firstname' => 'Marc',
                'lastname'  => 'Schueller',
                'address1'  => '19 rue Basse',
                'address2'  => NULL,
                'zipcode'   => '68420',
                'city'      => 'Gueberschwihr',
                'phone'     => '06 08 57 46 81',
                'email'     => 'marc@vins-schueller.com',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 77,
                'login'     => 'philippe.seibert@free.fr',
                'firstname' => 'Philippe',
                'lastname'  => 'Seibert',
                'address1'  => '5 rue de Bitche',
                'address2'  => NULL,
                'zipcode'   => '57720',
                'city'      => 'Volmunster',
                'phone'     => '06 85 75 50 01',
                'email'     => 'philippe.seibert@free.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 78,
                'login'     => 'b.sesmat@laposte.net',
                'firstname' => 'Benoit',
                'lastname'  => 'Sesmat',
                'address1'  => 'Ferme de Rosebois',
                'address2'  => NULL,
                'zipcode'   => '54280',
                'city'      => 'MONCEL S/SEILLE',
                'phone'     => '06 67 54 60 47',
                'email'     => 'b.sesmat@laposte.net',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 79,
                'login'     => 'theobalddenis@gmail.com',
                'firstname' => 'Denis',
                'lastname'  => 'Théobald',
                'address1'  => '17 rue des Moulins',
                'address2'  => NULL,
                'zipcode'   => '57410',
                'city'      => 'Bettviller',
                'phone'     => '06 89 20 42 58',
                'email'     => 'theobalddenis@gmail.com',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 80,
                'login'     => 'willmann.remy@free/fr',
                'firstname' => 'Rémy',
                'lastname'  => 'WILLMANN',
                'address1'  => '9 Rue de la Libération',
                'address2'  => NULL,
                'zipcode'   => '67230',
                'city'      => 'HERBHEIM',
                'phone'     => '03 88 74 26 89',
                'email'     => 'willmann.remy@free/fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 81,
                'login'     => 'earl.wittersheim@wanadoo.fr',
                'firstname' => 'Hubert',
                'lastname'  => 'Wittersheim',
                'address1'  => '38 rue Principale',
                'address2'  => NULL,
                'zipcode'   => '67140',
                'city'      => 'Zellwiller',
                'phone'     => '06 72 43 79 82',
                'email'     => 'earl.wittersheim@wanadoo.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 4,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 82,
                'login'     => 'andre.beneventi@wanadoo.fr',
                'firstname' => 'André',
                'lastname'  => 'BENEVENTI',
                'address1'  => '2603 Route de Carles',
                'address2'  => NULL,
                'zipcode'   => '83573',
                'city'      => 'Cotignac',
                'phone'     => '06 07 77 12 50',
                'email'     => 'andre.beneventi@wanadoo.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 5,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 83,
                'login'     => 'cberoujon@orange.fr',
                'firstname' => 'Jean-Claude',
                'lastname'  => 'Béroujon',
                'address1'  => '164 Rue de la Croix Rousse',
                'address2'  => NULL,
                'zipcode'   => '69460',
                'city'      => 'Salles Arbuissonnas en beaujolais',
                'phone'     => '06 07 34 54 55',
                'email'     => 'cberoujon@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 5,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 84,
                'login'     => 'les.restanques@wanadoo.fr',
                'firstname' => 'Jacky',
                'lastname'  => 'BONNEFOY',
                'address1'  => 'Glorivette',
                'address2'  => NULL,
                'zipcode'   => '84750',
                'city'      => 'St Martin de Castillon',
                'phone'     => '06 19 24 02 77',
                'email'     => 'les.restanques@wanadoo.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 5,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 85,
                'login'     => 'r-cambray@orange.fr',
                'firstname' => 'Richard',
                'lastname'  => 'Cambray',
                'address1'  => 'Magneux Le Gabion',
                'address2'  => NULL,
                'zipcode'   => '42210',
                'city'      => 'St Laurent La Conche',
                'phone'     => '06 89 88 44 29',
                'email'     => 'r-cambray@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 5,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 86,
                'login'     => 'jerome.chapel@wanadoo.fr',
                'firstname' => 'Jérôme',
                'lastname'  => 'Chapel',
                'address1'  => '398 Vic le Comte',
                'address2'  => 'Benaud',
                'zipcode'   => '63270',
                'city'      => 'Laps',
                'phone'     => '06 85 88 51 50',
                'email'     => 'jerome.chapel@wanadoo.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 5,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 87,
                'login'     => 'defressanges@gmail.com',
                'firstname' => 'Charles-Etienne',
                'lastname'  => 'De Fressanges',
                'address1'  => 'Les Bonins',
                'address2'  => NULL,
                'zipcode'   => '3230',
                'city'      => 'Gannay-sur-Loire',
                'phone'     => '06 29 67 18 72',
                'email'     => 'defressanges@gmail.com',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 5,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 88,
                'login'     => 'delorme.jeanlouis@orange.fr',
                'firstname' => 'Jean-Louis',
                'lastname'  => 'Delorme',
                'address1'  => '10 route de magneux',
                'address2'  => NULL,
                'zipcode'   => '42110',
                'city'      => 'Chambeon',
                'phone'     => '06 08 65 52 51',
                'email'     => 'delorme.jeanlouis@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 5,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 89,
                'login'     => 'emifred.detable@wanadoo.fr',
                'firstname' => 'Frédéric',
                'lastname'  => 'Detable',
                'address1'  => 'Dordres',
                'address2'  => NULL,
                'zipcode'   => '58460',
                'city'      => 'Corvol L',
                'phone'     => 'Orgueilleux',
                'email'     => '06 70 53 94 59',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 1,
             'password'  => Hash::make('123123'),
                ]);


            User::create([
                'id'        => 90,
                'login'     => '',
                'firstname' => 'Elian',
                'lastname'  => 'GAUFFRIDY',
                'address1'  => '143 Chemin de Méleyrettes',
                'address2'  => NULL,
                'zipcode'   => '84490',
                'city'      => 'Saint Saturnin les Apt',
                'phone'     => NULL,
                'email'     => 'test2@gmail.com',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 5,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 91,
                'login'     => 'domaine.des.caves@wanadoo.fr',
                'firstname' => 'Laurent',
                'lastname'  => 'Gauthier',
                'address1'  => 'Les Caves',
                'address2'  => NULL,
                'zipcode'   => '69840',
                'city'      => 'Chénas',
                'phone'     => '0680 73 64 83',
                'email'     => 'domaine.des.caves@wanadoo.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 5,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 92,
                'login'     => 'marie.blondet@bbox.fr',
                'firstname' => 'Benoit',
                'lastname'  => 'Laroche',
                'address1'  => 'Route de Vignoux',
                'address2'  => NULL,
                'zipcode'   => '18220',
                'city'      => 'Soulangis',
                'phone'     => '06 87 47 60 56',
                'email'     => 'marie.blondet@bbox.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 5,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 93,
                'login'     => 'minet.regis@wanadoo.fr',
                'firstname' => 'Régis',
                'lastname'  => 'Minet',
                'address1'  => '5 rue du Domaine du Bouchot',
                'address2'  => 'Domaine Régis Minet',
                'zipcode'   => '58150',
                'city'      => 'Pouilly Sur Loire',
                'phone'     => '06 08 88 60 50',
                'email'     => 'minet.regis@wanadoo.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 5,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 94,
                'login'     => 'jeanlouis.miolane@gmail.com',
                'firstname' => 'Jean-Louis',
                'lastname'  => 'Miolane',
                'address1'  => 'Le Zacharie',
                'address2'  => NULL,
                'zipcode'   => '69460',
                'city'      => 'Salles Arbuissonnas',
                'phone'     => '06 51 87 64 30',
                'email'     => 'jeanlouis.miolane@gmail.com',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 5,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 95,
                'login'     => 'nigay.pascal.chantal@wanadoo.fr',
                'firstname' => 'Pascal',
                'lastname'  => 'NIGAY',
                'address1'  => '18 Chemin de Thulon',
                'address2'  => NULL,
                'zipcode'   => '69430',
                'city'      => 'Lantignié',
                'phone'     => '06 88 17 07 18',
                'email'     => 'nigay.pascal.chantal@wanadoo.fr',
                'type_id'      => 1,
                'scope_id'     => 2,
                'area_id'      => 5,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 96,
                'login'     => 'gaec.cotes@orange.fr',
                'firstname' => 'Franck',
                'lastname'  => 'Pouzadoux',
                'address1'  => '5 rue du Lavoir / Glénat',
                'address2'  => NULL,
                'zipcode'   => '63460',
                'city'      => 'Artonne',
                'phone'     => '06 61 56 08 36',
                'email'     => 'gaec.cotes@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 5,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 97,
                'login'     => 't.presles@wanadoo.fr',
                'firstname' => 'Thibault',
                'lastname'  => 'Presles',
                'address1'  => 'Les Poiriers',
                'address2'  => NULL,
                'zipcode'   => '3290',
                'city'      => 'Diou',
                'phone'     => '06 07 30 47 90',
                'email'     => 't.presles@wanadoo.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 5,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 98,
                'login'     => 'jean.sanial0156@orange.fr',
                'firstname' => 'Jean',
                'lastname'  => 'Sanial',
                'address1'  => 'les Ambreux',
                'address2'  => NULL,
                'zipcode'   => '42210',
                'city'      => 'St Laurent La Conche',
                'phone'     => '06 81 68 37 44',
                'email'     => 'jean.sanial0156@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 5,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 99,
                'login'     => 'rogersanlaville@orange.fr',
                'firstname' => 'Roger',
                'lastname'  => 'Sanlaville',
                'address1'  => '68 rue de Blacé',
                'address2'  => NULL,
                'zipcode'   => '69460',
                'city'      => 'Vaux en Beaujolais',
                'phone'     => '06 07 03 79 64',
                'email'     => 'rogersanlaville@orange.fr',
                'type_id'      => 1,
                'scope_id'     => 1,
                'area_id'      => 5,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 100,
                'login'     => '1001',
                'firstname' => 'Laurent',
                'lastname'  => 'THOMAS',
                'address1'  => NULL,
                'address2'  => NULL,
                'zipcode'   => NULL,
                'city'      => NULL,
                'phone'     => NULL,
                'email'     => 'laurent.thomas@suissegrele.com',
                'type_id'      => 2,
                'scope_id'     => NULL,
                'area_id'      => NULL,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 101,
                'login'     => '1012',
                'firstname' => 'Florian',
                'lastname'  => 'AUBRY',
                'address1'  => NULL,
                'address2'  => NULL,
                'zipcode'   => NULL,
                'city'      => NULL,
                'phone'     => NULL,
                'email'     => 'florian.aubry@suissegrele.com',
                'type_id'      => 2,
                'scope_id'     => NULL,
                'area_id'      => NULL,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 102,
                'login'     => '1009',
                'firstname' => 'Valérie',
                'lastname'  => 'FIDONE',
                'address1'  => NULL,
                'address2'  => NULL,
                'zipcode'   => NULL,
                'city'      => NULL,
                'phone'     => NULL,
                'email'     => 'valerie.fidone@suissegrele.com',
                'type_id'      => 2,
                'scope_id'     => NULL,
                'area_id'      => NULL,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 103,
                'login'     => '1010',
                'firstname' => 'Sandrine',
                'lastname'  => 'NAUDIN',
                'address1'  => NULL,
                'address2'  => NULL,
                'zipcode'   => NULL,
                'city'      => NULL,
                'phone'     => NULL,
                'email'     => 'sandrine.naudin@suissegrele.com',
                'type_id'      => 2,
                'scope_id'     => NULL,
                'area_id'      => NULL,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 104,
                'login'     => '1018',
                'firstname' => 'Sarah',
                'lastname'  => 'FORQUET',
                'address1'  => NULL,
                'address2'  => NULL,
                'zipcode'   => NULL,
                'city'      => NULL,
                'phone'     => NULL,
                'email'     => 'sarah.forquet@suissegrele.com',
                'type_id'      => 2,
                'scope_id'     => NULL,
                'area_id'      => NULL,
             'password'  => Hash::make('123123'),
            ]);


            User::create([
                'id'        => 105,
                'login'     => 'PICOLETADMIN',
                'firstname' => 'Camille',
                'lastname'  => 'PICOLET',
                'address1'  => NULL,
                'address2'  => NULL,
                'zipcode'   => NULL,
                'city'      => NULL,
                'phone'     => NULL,
                'email'     => 'camille.picolet@avril-conseil.com',
                'type_id'      => 3,
                'scope_id'     => NULL,
                'area_id'      => NULL,
             'password'  => Hash::make('123123'),
            ]);


        }
    }
