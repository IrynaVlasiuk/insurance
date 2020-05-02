<?php

    use App\Models\Claims\Plots\ClaimPlot;
    use Illuminate\Database\Seeder;

    class ClaimPlotsSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            ClaimPlot::create([
                'claim_id'                 => 1,
                'plot_number'           => 1,
                'insee'                 => '77500',
                'plot_name'             => 'BARRIERE',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 5,
                'yield_increase'        => 7,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 160,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 1,
                'plot_number'           => 2,
                'insee'                 => '77500',
                'plot_name'             => 'GARENNE',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 1,
                'yield_increase'        => 6,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 160,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 1,
                'plot_number'           => 3,
                'insee'                 => '77500',
                'plot_name'             => 'CHAMP BATAILLE',
                'crop_code'             => '160',
                'crop_name'             => 'Betterave sucrière',
                'crop_variety'          => '',
                'plot_surface'             => 10,
                'yield'                 => 60,
                'yield_increase'        => 0,
                'unit_price'            => 30,
                'deductible_hail_plot'  => '5',
                'storm_plot'            => 'nein',
                'deductible_storm_plot' => '30',
                'quality'               => 'ja',
                'sandstorm'             => 'nein'
            ]);


            ClaimPlot::create([
                'claim_id'                 => 1,
                'plot_number'           => 4,
                'insee'                 => '77500',
                'plot_name'             => 'CHAMP BATAILLE',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 8,
                'yield_increase'        => 7,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 160,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 1,
                'plot_number'           => 5,
                'insee'                 => '77500',
                'plot_name'             => 'LA TUILERIE',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 11,
                'yield_increase'        => 8,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 160,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 1,
                'plot_number'           => 6,
                'insee'                 => '77500',
                'plot_name'             => 'LA TUILERIE',
                'crop_code'             => '380',
                'crop_name'             => 'Colza d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 12,
                'yield_increase'        => 4,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 340,
                'storm_plot'            => '10',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 1,
                'plot_number'           => 7,
                'insee'                 => '77500',
                'plot_name'             => 'LA GUYAILLERIE',
                'crop_code'             => '210',
                'crop_name'             => 'Orge de printemps',
                'crop_variety'          => '',
                'plot_surface'             => 5,
                'yield'                 => 7,
                'yield_increase'        => 0,
                'unit_price'            => 150,
                'deductible_hail_plot'  => '5',
                'storm_plot'            => 'nein',
                'deductible_storm_plot' => '30',
                'quality'               => 'nein',
                'sandstorm'             => 'nein'
            ]);


            ClaimPlot::create([
                'claim_id'                 => 1,
                'plot_number'           => 8,
                'insee'                 => '77500',
                'plot_name'             => 'MAISON VERGER',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 0,
                'yield_increase'        => 5,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 160,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 1,
                'plot_number'           => 9,
                'insee'                 => '77500',
                'plot_name'             => 'VIGNES DES GRANGES',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 0,
                'yield_increase'        => 5,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 160,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 1,
                'plot_number'           => 10,
                'insee'                 => '77500',
                'plot_name'             => 'VILLEROY',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 12,
                'yield_increase'        => 8,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 160,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 1,
                'plot_number'           => 11,
                'insee'                 => '77500',
                'plot_name'             => 'VILLEROY',
                'crop_code'             => '211',
                'crop_name'             => 'Orge d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 10,
                'yield_increase'        => 7,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 120,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 1,
                'plot_number'           => 12,
                'insee'                 => '77500',
                'plot_name'             => 'COTE PASSY',
                'crop_code'             => '380',
                'crop_name'             => 'Colza d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 2,
                'yield_increase'        => 4,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 340,
                'storm_plot'            => '10',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 1,
                'plot_number'           => 13,
                'insee'                 => '77500',
                'plot_name'             => 'MARCHAIS TIBERGE',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 4,
                'yield_increase'        => 7,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 160,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 1,
                'plot_number'           => 14,
                'insee'                 => '77500',
                'plot_name'             => 'MARCHAIS ROUGE',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 1,
                'yield_increase'        => 6,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 160,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 1,
                'plot_number'           => 15,
                'insee'                 => '77500',
                'plot_name'             => 'ROUTE DES GRANGES',
                'crop_code'             => '380',
                'crop_name'             => 'Colza d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 1,
                'yield_increase'        => 4,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 340,
                'storm_plot'            => '10',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 1,
                'plot_number'           => 16,
                'insee'                 => '77500',
                'plot_name'             => 'FAUSSE NOIR',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 4,
                'yield_increase'        => 7,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 160,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 2,
                'plot_number'           => 1,
                'insee'                 => '77500',
                'plot_name'             => 'BARRIERE',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 5,
                'yield_increase'        => 7,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 160,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 2,
                'plot_number'           => 2,
                'insee'                 => '77500',
                'plot_name'             => 'GARENNE',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 1,
                'yield_increase'        => 6,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 160,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 2,
                'plot_number'           => 3,
                'insee'                 => '77500',
                'plot_name'             => 'CHAMP BATAILLE',
                'crop_code'             => '160',
                'crop_name'             => 'Betterave sucrière',
                'crop_variety'          => '',
                'plot_surface'             => 10,
                'yield'                 => 60,
                'yield_increase'        => 0,
                'unit_price'            => 30,
                'deductible_hail_plot'  => '5',
                'storm_plot'            => 'nein',
                'deductible_storm_plot' => '30',
                'quality'               => 'ja',
                'sandstorm'             => 'nein'
            ]);


            ClaimPlot::create([
                'claim_id'                 => 2,
                'plot_number'           => 4,
                'insee'                 => '77500',
                'plot_name'             => 'CHAMP BATAILLE',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 8,
                'yield_increase'        => 7,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 160,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 2,
                'plot_number'           => 5,
                'insee'                 => '77500',
                'plot_name'             => 'LA TUILERIE',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 11,
                'yield_increase'        => 8,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 160,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 2,
                'plot_number'           => 6,
                'insee'                 => '77500',
                'plot_name'             => 'LA TUILERIE',
                'crop_code'             => '380',
                'crop_name'             => 'Colza d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 12,
                'yield_increase'        => 4,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 340,
                'storm_plot'            => '10',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 2,
                'plot_number'           => 7,
                'insee'                 => '77500',
                'plot_name'             => 'LA GUYAILLERIE',
                'crop_code'             => '210',
                'crop_name'             => 'Orge de printemps',
                'crop_variety'          => '',
                'plot_surface'             => 5,
                'yield'                 => 7,
                'yield_increase'        => 0,
                'unit_price'            => 150,
                'deductible_hail_plot'  => '5',
                'storm_plot'            => 'nein',
                'deductible_storm_plot' => '30',
                'quality'               => 'nein',
                'sandstorm'             => 'nein'
            ]);


            ClaimPlot::create([
                'claim_id'                 => 2,
                'plot_number'           => 8,
                'insee'                 => '77500',
                'plot_name'             => 'MAISON VERGER',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 0,
                'yield_increase'        => 5,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 160,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 2,
                'plot_number'           => 9,
                'insee'                 => '77500',
                'plot_name'             => 'VIGNES DES GRANGES',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 0,
                'yield_increase'        => 5,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 160,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 2,
                'plot_number'           => 10,
                'insee'                 => '77500',
                'plot_name'             => 'VILLEROY',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 12,
                'yield_increase'        => 8,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 160,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 2,
                'plot_number'           => 11,
                'insee'                 => '77500',
                'plot_name'             => 'VILLEROY',
                'crop_code'             => '211',
                'crop_name'             => 'Orge d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 10,
                'yield_increase'        => 7,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 120,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 2,
                'plot_number'           => 12,
                'insee'                 => '77500',
                'plot_name'             => 'COTE PASSY',
                'crop_code'             => '380',
                'crop_name'             => 'Colza d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 2,
                'yield_increase'        => 4,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 340,
                'storm_plot'            => '10',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 2,
                'plot_number'           => 13,
                'insee'                 => '77500',
                'plot_name'             => 'MARCHAIS TIBERGE',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 4,
                'yield_increase'        => 7,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 160,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 2,
                'plot_number'           => 14,
                'insee'                 => '77500',
                'plot_name'             => 'MARCHAIS ROUGE',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 1,
                'yield_increase'        => 6,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 160,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 2,
                'plot_number'           => 15,
                'insee'                 => '77500',
                'plot_name'             => 'ROUTE DES GRANGES',
                'crop_code'             => '380',
                'crop_name'             => 'Colza d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 1,
                'yield_increase'        => 4,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 340,
                'storm_plot'            => '10',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 2,
                'plot_number'           => 16,
                'insee'                 => '77500',
                'plot_name'             => 'FAUSSE NOIR',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 4,
                'yield_increase'        => 7,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 160,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 3,
                'plot_number'           => 1,
                'insee'                 => '02670',
                'plot_name'             => 'Selon PAC',
                'crop_code'             => '250',
                'crop_name'             => 'Maïs grain et Maïs ensilage',
                'crop_variety'          => '',
                'plot_surface'             => 29,
                'yield'                 => 10,
                'yield_increase'        => 0,
                'unit_price'            => 160,
                'deductible_hail_plot'  => '5',
                'storm_plot'            => 'nein',
                'deductible_storm_plot' => '30',
                'quality'               => 'ja',
                'sandstorm'             => 'nein'
            ]);


            ClaimPlot::create([
                'claim_id'                 => 3,
                'plot_number'           => 2,
                'insee'                 => '02670',
                'plot_name'             => 'Selon PAC',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 56,
                'yield_increase'        => 11,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 150,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'ja'
            ]);


            ClaimPlot::create([
                'claim_id'                 => 3,
                'plot_number'           => 3,
                'insee'                 => '02670',
                'plot_name'             => 'Selon PAC',
                'crop_code'             => '160',
                'crop_name'             => 'Betterave sucrière',
                'crop_variety'          => '',
                'plot_surface'             => 9,
                'yield'                 => 106,
                'yield_increase'        => 0,
                'unit_price'            => 22,
                'deductible_hail_plot'  => '5',
                'storm_plot'            => 'nein',
                'deductible_storm_plot' => '30',
                'quality'               => 'ja',
                'sandstorm'             => 'nein'
            ]);


            ClaimPlot::create([
                'claim_id'                 => 3,
                'plot_number'           => 4,
                'insee'                 => '02670',
                'plot_name'             => 'Selon PAC',
                'crop_code'             => '380',
                'crop_name'             => 'Colza d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 22,
                'yield_increase'        => 5,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 320,
                'storm_plot'            => '10',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 4,
                'plot_number'           => 1,
                'insee'                 => '55583',
                'plot_name'             => 'Selon PAC',
                'crop_code'             => '380',
                'crop_name'             => 'Colza d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 46,
                'yield_increase'        => 4,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 350,
                'storm_plot'            => '10',
                'deductible_storm_plot' => 'ja',
                'quality'               => '10',
                'sandstorm'             => 'nein',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 4,
                'plot_number'           => 2,
                'insee'                 => '55583',
                'plot_name'             => 'Selon PAC',
                'crop_code'             => '250',
                'crop_name'             => 'Maïs grain et Maïs ensilage',
                'crop_variety'          => '',
                'plot_surface'             => 32,
                'yield'                 => 6,
                'yield_increase'        => 10,
                'unit_price'            => 175,
                'deductible_hail_plot'  => '5',
                'storm_plot'            => 'nein',
                'deductible_storm_plot' => '30',
                'quality'               => 'ja',
                'sandstorm'             => 'nein'
            ]);


            ClaimPlot::create([
                'claim_id'                 => 4,
                'plot_number'           => 3,
                'insee'                 => '55583',
                'plot_name'             => 'Selon PAC',
                'crop_code'             => '211',
                'crop_name'             => 'Orge d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 60,
                'yield_increase'        => 8,
                'unit_price'            => 0,
                'deductible_hail_plot'  => 150,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'ja',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 4,
                'plot_number'           => 4,
                'insee'                 => '55583',
                'plot_name'             => 'Selon PAC',
                'crop_code'             => '110',
                'crop_name'             => 'Blé tendre d',
                'crop_variety'          => 'hiver',
                'plot_surface'             => '',
                'yield'                 => 74,
                'yield_increase'        => 7,
                'unit_price'            => 5,
                'deductible_hail_plot'  => 150,
                'storm_plot'            => '5',
                'deductible_storm_plot' => 'nein',
                'quality'               => '30',
                'sandstorm'             => 'ja',
            ]);


            ClaimPlot::create([
                'claim_id'                 => 4,
                'plot_number'           => 5,
                'insee'                 => '55583',
                'plot_name'             => 'Selon PAC',
                'crop_code'             => '210',
                'crop_name'             => 'Orge de printemps',
                'crop_variety'          => '',
                'plot_surface'             => 22,
                'yield'                 => 6,
                'yield_increase'        => 8,
                'unit_price'            => 160,
                'deductible_hail_plot'  => '5',
                'storm_plot'            => 'nein',
                'deductible_storm_plot' => '30',
                'quality'               => 'ja',
                'sandstorm'             => 'nein'
            ]);


            ClaimPlot::create([
                'claim_id'                 => 5,
                'plot_number'           => 1,
                'insee'                 => '51601',
                'plot_name'             => 'LES COTES JOPIN',
                'crop_code'             => '400',
                'crop_name'             => 'Vigne',
                'crop_variety'          => 'Champagne AOP',
                'plot_surface'             => 1,
                'yield'                 => 4000,
                'yield_increase'        => NULL,
                'unit_price'            => 7,
                'deductible_hail_plot'  => '10',
                'storm_plot'            => 'nein',
                'deductible_storm_plot' => '30',
                'quality'               => 'nein',
                'sandstorm'             => 'nein'
            ]);


            ClaimPlot::create([
                'claim_id'                 => 5,
                'plot_number'           => 2,
                'insee'                 => '51601',
                'plot_name'             => 'LE CHAMP LA CAVE',
                'crop_code'             => '400',
                'crop_name'             => 'Vigne',
                'crop_variety'          => 'Champagne AOP',
                'plot_surface'             => 2,
                'yield'                 => 4000,
                'yield_increase'        => NULL,
                'unit_price'            => 7,
                'deductible_hail_plot'  => '10',
                'storm_plot'            => 'nein',
                'deductible_storm_plot' => '30',
                'quality'               => 'nein',
                'sandstorm'             => 'nein'
            ]);


            ClaimPlot::create([
                'claim_id'                 => 5,
                'plot_number'           => 3,
                'insee'                 => '51647',
                'plot_name'             => 'LE MONT DE FOURCHE',
                'crop_code'             => '400',
                'crop_name'             => 'Vigne',
                'crop_variety'          => 'Champagne AOP',
                'plot_surface'             => 0,
                'yield'                 => 4000,
                'yield_increase'        => NULL,
                'unit_price'            => 7,
                'deductible_hail_plot'  => '10',
                'storm_plot'            => 'nein',
                'deductible_storm_plot' => '30',
                'quality'               => 'nein',
                'sandstorm'             => 'nein'
            ]);


            ClaimPlot::create([
                'claim_id'                 => 5,
                'plot_number'           => 4,
                'insee'                 => '51647',
                'plot_name'             => 'LE MONT DE FOURCHE',
                'crop_code'             => '400',
                'crop_name'             => 'Vigne',
                'crop_variety'          => 'Champagne AOP',
                'plot_surface'             => 0,
                'yield'                 => 4000,
                'yield_increase'        => NULL,
                'unit_price'            => 7,
                'deductible_hail_plot'  => '10',
                'storm_plot'            => 'nein',
                'deductible_storm_plot' => '30',
                'quality'               => 'nein',
                'sandstorm'             => 'nein'
            ]);


            ClaimPlot::create([
                'claim_id'                 => 6,
                'plot_number'           => 1,
                'insee'                 => '51601',
                'plot_name'             => 'LES COTES JOPIN',
                'crop_code'             => '400',
                'crop_name'             => 'Vigne',
                'crop_variety'          => 'Champagne AOP',
                'plot_surface'             => 1,
                'yield'                 => 4000,
                'yield_increase'        => NULL,
                'unit_price'            => 7,
                'deductible_hail_plot'  => '10',
                'storm_plot'            => 'nein',
                'deductible_storm_plot' => '30',
                'quality'               => 'nein',
                'sandstorm'             => 'nein'
            ]);


            ClaimPlot::create([
                'claim_id'                 => 6,
                'plot_number'           => 2,
                'insee'                 => '51601',
                'plot_name'             => 'LE CHAMP LA CAVE',
                'crop_code'             => '400',
                'crop_name'             => 'Vigne',
                'crop_variety'          => 'Champagne AOP',
                'plot_surface'             => 2,
                'yield'                 => 4000,
                'yield_increase'        => NULL,
                'unit_price'            => 7,
                'deductible_hail_plot'  => '10',
                'storm_plot'            => 'nein',
                'deductible_storm_plot' => '30',
                'quality'               => 'nein',
                'sandstorm'             => 'nein'
            ]);


            ClaimPlot::create([
                'claim_id'                 => 6,
                'plot_number'           => 3,
                'insee'                 => '51647',
                'plot_name'             => 'LE MONT DE FOURCHE',
                'crop_code'             => '400',
                'crop_name'             => 'Vigne',
                'crop_variety'          => 'Champagne AOP',
                'plot_surface'             => 0,
                'yield'                 => 4000,
                'yield_increase'        => NULL,
                'unit_price'            => 7,
                'deductible_hail_plot'  => '10',
                'storm_plot'            => 'nein',
                'deductible_storm_plot' => '30',
                'quality'               => 'nein',
                'sandstorm'             => 'nein'
            ]);


            ClaimPlot::create([
                'claim_id'                 => 6,
                'plot_number'           => 4,
                'insee'                 => '51647',
                'plot_name'             => 'LE MONT DE FOURCHE',
                'crop_code'             => '400',
                'crop_name'             => 'Vigne',
                'crop_variety'          => 'Champagne AOP',
                'plot_surface'             => 0,
                'yield'                 => 4000,
                'yield_increase'        => NULL,
                'unit_price'            => 7,
                'deductible_hail_plot'  => '10',
                'storm_plot'            => 'nein',
                'deductible_storm_plot' => '30',
                'quality'               => 'nein',
                'sandstorm'             => 'nein'
            ]);
        }
    }
