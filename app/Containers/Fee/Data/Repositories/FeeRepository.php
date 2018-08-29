<?php

namespace App\Containers\Fee\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class FeeRepository
 */
class FeeRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
