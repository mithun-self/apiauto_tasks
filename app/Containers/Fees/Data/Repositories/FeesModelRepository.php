<?php

namespace App\Containers\Fees\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class FeesModelRepository
 */
class FeesModelRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
