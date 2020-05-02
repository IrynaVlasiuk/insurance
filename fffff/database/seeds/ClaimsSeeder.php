<?php

    use App\Models\Claims\Claim;
    use Illuminate\Database\Seeder;

class ClaimsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Claim::create( [
            'id'=>1,
            'external_id'=>'1',
            'external_system'=>'WINSURE',
            'happened_at'=>NULL,
            'created_at'=>NULL,
            'contract_number'=>'200000001',
            'damage_type'=>'Storm',
            'chief_assessor_id'=>NULL,
            'manager_assessor_id'=>NULL,
            'contract_id'=>3,
            'area_id'=>NULL,
            'status_id'=>NULL
        ] );



        Claim::create( [
            'id'=>2,
            'external_id'=>'2',
            'external_system'=>'WINSURE',
            'happened_at'=>NULL,
            'created_at'=>NULL,
            'contract_number'=>'200000001',
            'damage_type'=>'Hail',
            'chief_assessor_id'=>NULL,
            'manager_assessor_id'=>NULL,
            'contract_id'=>3,
            'area_id'=>NULL,
            'status_id'=>NULL
        ] );



        Claim::create( [
            'id'=>3,
            'external_id'=>'3',
            'external_system'=>'WINSURE',
            'happened_at'=>NULL,
            'created_at'=>NULL,
            'contract_number'=>'200004001',
            'damage_type'=>'Sand',
            'chief_assessor_id'=>NULL,
            'manager_assessor_id'=>NULL,
            'contract_id'=>2,
            'area_id'=>NULL,
            'status_id'=>NULL
        ] );



        Claim::create( [
            'id'=>4,
            'external_id'=>'4',
            'external_system'=>'WINSURE',
            'happened_at'=>NULL,
            'created_at'=>NULL,
            'contract_number'=>'207419001',
            'damage_type'=>'Hail',
            'chief_assessor_id'=>NULL,
            'manager_assessor_id'=>NULL,
            'contract_id'=>4,
            'area_id'=>NULL,
            'status_id'=>NULL
        ] );



        Claim::create( [
            'id'=>5,
            'external_id'=>'5',
            'external_system'=>'WINSURE',
            'happened_at'=>NULL,
            'created_at'=>NULL,
            'contract_number'=>'210680001',
            'damage_type'=>'Hail',
            'chief_assessor_id'=>NULL,
            'manager_assessor_id'=>NULL,
            'contract_id'=>1,
            'area_id'=>NULL,
            'status_id'=>NULL
        ] );



        Claim::create( [
            'id'=>6,
            'external_id'=>'6',
            'external_system'=>'WINSURE',
            'happened_at'=>NULL,
            'created_at'=>NULL,
            'contract_number'=>'210680001',
            'damage_type'=>'Storm',

            'chief_assessor_id'=>NULL,
            'manager_assessor_id'=>NULL,
            'contract_id'=>1,
            'area_id'=>NULL,
            'status_id'=>NULL
        ] );
    }
}
