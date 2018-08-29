<?php

namespace App\Containers\NewFees\UI\API\Transformers;

use App\Containers\NewFees\Models\NewFees;
use App\Ship\Parents\Transformers\Transformer;

class NewFeesTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param NewFees $entity
     *
     * @return array
     */
    public function transform(NewFees $entity)
    {
        $response = [
            'object' => 'NewFees',
            'id' => $entity->getHashedKey(),
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
