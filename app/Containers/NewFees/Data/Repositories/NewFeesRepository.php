<?php

namespace App\Containers\NewFees\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class NewFeesRepository
 */
class NewFeesRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
