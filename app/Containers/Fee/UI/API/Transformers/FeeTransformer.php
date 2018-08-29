<?php

namespace App\Containers\Fee\UI\API\Transformers;

use App\Containers\Fee\Models\Fee;
use App\Ship\Parents\Transformers\Transformer;

class FeeTransformer extends Transformer
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
     * @param Fee $entity
     *
     * @return array
     */
    public function transform(Fee $entity)
    {
        $response = [
            'object' => 'Fee',
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
