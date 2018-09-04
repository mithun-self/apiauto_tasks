<?php

namespace App\Containers\MerchantFeeMap\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class MerchantFeeMapRepository
 */
class MerchantFeeMapRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
