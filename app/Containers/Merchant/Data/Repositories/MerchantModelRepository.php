<?php

namespace App\Containers\Merchant\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class MerchantModelRepository
 */
class MerchantModelRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
