<?php

    namespace App\Services\Claims;

    use App\Models\Claims\Claim;
    use App\Models\Contracts\Contract;
    use App\Models\Tiers\Tier;
    use App\Models\Users\User;
    use App\Services\Service;


    /**
     * Class ClaimSorting
     * ClaimSorting for ag-grid server side sorting
     *
     * @package App\Services\Claims
     */
    class ClaimSorting extends Service
    {

        public function sorting($orderBy, $claim = null)
        {
            if(!$claim){
                $claim = new Claim();
            }
            if(\Auth::user('api') instanceof Tier){
                $claim = $claim->whereIn('contract_id', function($q) {
                    $q->select('id')
                        ->from((new Contract())->getTable())
                        ->where('agent_id', \Auth::user('api')->id);
                });
                //dd($claim->toSql());
            }
            if($orderBy){
                if($orderBy['colId'] == 'area.name'){
                    $claim = $claim->leftJoin('areas', 'claims.area_id', '=', 'areas.id')
                        ->orderBy('areas.name', $orderBy['sort']);
                } elseif($orderBy['colId'] == 'contract.customer.company'){
                    $claim = $claim->leftJoin('contracts', 'claims.contract_id', '=', 'contracts.id')
                        ->leftJoin('tiers', 'contracts.customer_id', '=', 'tiers.id')
                        ->orderBy('tiers.company', $orderBy['sort']);
                } elseif($orderBy['colId'] == 'insee_code.name'){
                    $claim = $claim->leftJoin('insee', 'claims.insee', '=', 'insee.code')
                        ->orderBy('insee.name', $orderBy['sort']);
                } elseif($orderBy['colId'] == 'insee_code.departement'){
                    $claim = $claim->leftJoin('insee', 'claims.insee', '=', 'insee.code')
                        ->orderBy('insee.departement', $orderBy['sort']);
                } elseif($orderBy['colId'] == 'contract.product'){
                    $claim = $claim->leftJoin('contracts', 'claims.contract_id', '=', 'contracts.id')
                        ->orderBy('contracts.product', $orderBy['sort']);
                } elseif($orderBy['colId'] == 'manager_assessor.full_name'){
                    $claim = $claim->leftJoin('users', 'claims.manager_assessor_id', '=', 'users.id')
                        ->orderBy('users.firstname', $orderBy['sort'])
                        ->orderBy('users.lastname', $orderBy['sort']);
                } elseif($orderBy['colId'] == 'external_id'){
                    $claim = $claim->orderByRaw('external_id * 1 ' . $orderBy['sort']);
                } elseif($orderBy['colId'] == 'happened_at'){
                    $claim = $claim->orderBy('happened_at', $orderBy['sort']);
                } elseif($orderBy['colId'] == 'contract_number'){
                    $claim = $claim->orderBy('contract_number', $orderBy['sort']);
                } elseif($orderBy['colId'] == 'damage_type'){
                    $claim = $claim->orderBy('damage_type', $orderBy['sort']);
                } else {
                    $claim = $claim->orderBy($orderBy['colId'] . ' ' . $orderBy['sort']);
                }
            } else {
                $claim = $claim->orderByRaw('external_id * 1', $orderBy['sort']);
            }
            return $claim;
        }


    }
