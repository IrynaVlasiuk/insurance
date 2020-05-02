<?php

    namespace App\Services\Import;

    use App\Models\Areas\Area;
    use App\Models\Areas\Departments\Department;
    use App\Models\Claims\Claim;
    use App\Models\Claims\Plots\ClaimPlot;
    use App\Models\Contracts\Contract;
    use App\Services\Service;
    use DB;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Log;

    class ClaimImportService extends Service
    {

        public function import(Request $request)
        {
            try {
//                DB::beginTransaction();
                Log::channel('claim-import')->debug('Oracle Import', [
                    'total'   => count($request->toArray()),
                    //'request' => $request->toArray(),
                ]);

                foreach (json_decode($request->data) as $entry) {
                    $num = (array)$entry;
                    //if ($num['contract_number']=='204720001') {
                    $this->processImportEntry((array)$entry);
                    //}

                }
//                DB::commit();
            } catch (\Exception $e) {
//                DB::rollBack();
                Log::channel('claim-import')->error($e->getMessage());
                throw new \Exception($e);
            }

        }

        private function processImportEntry($entry)
        {
            $department = Department::whereCode($entry['department_code'])->firstOrFail();
            //Log::debug('Oracle Import, claim number '.$entry['external_id']);
            if (!$claim = Claim::where('external_id', $entry['external_id'])->first()) {
                Log::channel('claim-import')->debug('Oracle Import, creating claim '.$entry['external_id']);
                $claim = Claim::create(
                    [
                        'external_id'     => $entry['external_id'],
                        'contract_number' => $entry['contract_number'],
                        'happened_at'     => $entry['happened_at'],
                        'damage_type'     => $entry['damage_type'],
                        'harvest_year'    => $entry['harvest_year'],
                        'insee'           => $entry['insee'],
                        'area_id'         => $department->area_id,
                        'external_system' => 'WINSURE',
                        'note'            => $entry['note'] ?? null
                    ]
                );
                $this->createGlobalProvisionRecord($claim);
            } else {
                // TEMPORARY UPDATE
                $claim->contract_number = $entry['contract_number'] ?? null;
                $claim->note = $entry['note'] ?? null;
                $claim->save();
            }
            //Log::debug('Oracle Import, searching contract '.$entry['contract_number']);
            if ($contract = Contract::where('contract_number', $entry['contract_number'])->first()) {
                $claim->contract_id = $contract->id;
                $claim->insee = $contract->insee;
                $claim->save();
            }
            /*
                        Log::debug('Oracle Import, claim id '.$entry['external_id']);
                        Log::debug('Oracle Import, plot number '.$entry['plot_number']);
                        Log::debug('Oracle Import, object number '.$entry['object_number']);
            */
            if (isset($entry['plot_number'])) {
                if (!$claim_plots_subset = $claim->claim_plots()->where('plot_number', $entry['plot_number'])->get()) {
                    // plot_number is set but not found
                    $this->createRecord($claim,$entry);
                } else {
                    // plot_number is set & found
                    if (isset($entry['object_number'])) {

                        if (!$claim_plot = $claim_plots_subset->where('object_number', $entry['object_number'])->first()) {
                            $this->createRecord($claim,$entry);
                        } else {
                            $this->updateRecord($entry,$claim_plot);
                        }
                    } else {
                        // object_number is null
                        if (!$claim_plot = $claim_plots_subset->where('object_number', '=', NULL)->first()) {
                            $this->createRecord($claim,$entry);
                        } else {
                            $this->updateRecord($entry,$claim_plot);
                        }
                    }
                }
            } else {
                // plot_number is null
                if (!$claim_plots_subset = $claim->claim_plots()->where('plot_number', '=', NULL)->get()) {
                    //Log::debug('plot_number is null, no claims found');
                    $this->createRecord($claim,$entry);
                } else {
                    //Log::debug('plot_number is null, found a set of claims');
                    //Log::debug($claim_plots_subset);
                    if (isset($entry['object_number'])) {
                        if (!$claim_plot = $claim_plots_subset->where('object_number', $entry['object_number'])->first()) {
                            //Log::debug('object not null, no claim found');
                            $this->createRecord($claim,$entry);
                        } else {
                            //Log::debug('object not null, claim found');
                            $this->updateRecord($entry,$claim_plot);
                        }
                    } else {
                        // object_number is null
                        if (!$claim_plot = $claim_plots_subset->where('object_number', '=', NULL)->first()) {
                            $this->createRecord($claim,$entry);
                        } else {
                            $this->updateRecord($entry,$claim_plot);
                        }
                    }
                }
            }


            /*
                            if (!$claim_plot = $claim->claim_plots()->where('plot_number', $entry['plot_number'])->first()) { //, 'object_number' => $entry['object_number']

                            } else {

                            }
            */
        }


        private function updateRecord($entry,&$claim_plot)
        {
            //Log::debug('Oracle Import, updating plot');

            //Log::debug($claim_plot);
            // TEMPORARY UPDATE
            $claim_plot->object_number = $entry['object_number'] ?? null;
            $claim_plot->crop_name = $entry['crop_name'] ?? null;
            $claim_plot->plot_surface = $entry['plot_surface'] ?? null;
            $claim_plot->yield = $entry['yield'] ?? null;
            $claim_plot->capital_sum_estimation = $entry['capital_sum_estimation'] ?? null;
            $claim_plot->save();
        }

        private function createRecord($claim,$entry)
        {
            Log::channel('claim-import')->debug('Oracle Import, creating plot');
            $claim_plot = ClaimPlot::create(
                [
                    'claim_id'              => $claim->id,
                    'plot_name'             => $entry['plot_name'],
                    'plot_number'           => $entry['plot_number'],
                    'object_number'         => $entry['object_number'] ?? null,
                    'insee'                 => $entry['insee'] ?? null,
                    'crop_code'             => $entry['crop_code'] ?? null,
                    'crop_name'             => $entry['crop_name'] ?? null,
                    'plot_surface'          => $entry['plot_surface'] ?? null,
                    'crop_variety'          => $entry['crop_variety'] ?? null,
                    'yield'                 => $entry['yield'] ?? null,
                    'yield_increase'        => $entry['yield_increase'] ?? 0,
                    'unit_price'            => $entry['unit_price'] ?? 0,
                    'deductible_hail_plot'  => $entry['deductible_hail_plot'] ?? 0,
                    'storm_plot'            => $entry['storm_plot'] ?? 'nein',
                    'deductible_storm_plot' => $entry['deductible_storm_plot'] ?? 0,
                    'quality'               => $entry['quality'] ?? 'nein',
                    'sandstorm'             => $entry['sandstorm'] ?? 'nein',
                    'damaged'               => $entry['damaged'] ?? 0,
                    'harvest_in'            => $entry['harvest_in'] ?? null,
                    'capital_sum_estimation'=> $entry['capital_sum_estimation'] ?? null
                ]
            );
        }


        private function createGlobalProvisionRecord($claim)
        {
            Log::channel('claim-import')->debug('Oracle Import, creating global provision plot');
            $claim_plot = ClaimPlot::create(
                [
                    'claim_id'              => $claim->id,
                    'plot_name'             => 'Provision globale',
                    'plot_number'           => 0,
                    'object_number'         => null,
                    'insee'                 => null,
                    'crop_code'             => null,
                    'crop_name'             => null,
                    'plot_surface'          => null,
                    'crop_variety'          => null,
                    'yield'                 => null,
                    'yield_increase'        => 0,
                    'unit_price'            => 0,
                    'deductible_hail_plot'  => 0,
                    'storm_plot'            => 'nein',
                    'deductible_storm_plot' => 0,
                    'quality'               => 'nein',
                    'sandstorm'             => 'nein',
                    'damaged'               => 1,
                    'harvest_in'            => null,
                    'capital_sum_estimation'=> null
                ]
            );
        }

    }
