<?php

    namespace App\Transformers\Assessors;

    use League\Fractal\TransformerAbstract;

    /**
     * Data formatter
     *
     * Class AssessorsAvailableForClaimTransformer
     *
     * @package App\Transformers
     */
    class AssessorsAvailableForClaimTransformer extends TransformerAbstract
    {
        /**
         * Transform
         *
         * @param $customer
         * @return array
         */
        public function transform($assessors)
        {
            return [
                [
                    'label'   => 'In Area',
                    'options' => (array) $this->remapAssessors($assessors['inArea'])
                ],
                [
                    'label'   => 'Outside Area',
                    'options' => (array) $this->remapAssessors($assessors['outArea'])
                ],
            ];
        }
        
        /**
         * Remap Aseessors
         * @param $assessors
         * @return array
         */
        private function remapAssessors($assessors)
        {
            return collect($assessors)->map(function ($assessor) {
                return [
                    'value' => $assessor['id'],
                    'label' => $assessor['full_name'],
                    'count' => $assessor['claims_count']
                ];
            })->toArray();
        }
    }
