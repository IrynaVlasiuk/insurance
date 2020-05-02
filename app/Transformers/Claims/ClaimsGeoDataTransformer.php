<?php

    namespace App\Transformers\Claims;

    use App\Models\Claims\Claim;
    use League\Fractal\TransformerAbstract;

    /**
     * Data formatter
     *
     * Class ClaimsGeoDataTransformer
     *
     * @package App\Transformers
     */
    class ClaimsGeoDataTransformer extends TransformerAbstract
    {
        /**
         * Transform
         *
         * @param $customer
         * @return array
         */
        public function transform(Claim $claim)
        {
            return [
                'type'       => 'Feature',
                'geometry'   => [
                    'coordinates' => [$claim->inseeCode->long ?? '', $claim->inseeCode->lat ?? ''],
                    'type'        => 'Point',
                ],
                'properties' => [
                    'external_id' => $claim->external_id,
                    'id' => $claim->id,
                    'status_id' => $claim->status_id,
                    'happened_at' => $claim->happened_at->format('Y-m-d'),
                    'damage_type' => $claim->damage_type,
                    'status' => [
                        'name' => $claim->status->name
                    ],
                ]
            ];
        }
    }
