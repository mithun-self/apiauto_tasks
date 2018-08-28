<?php

namespace App\Containers\Fees\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccountsFeeRepository
 */
class AccountsFeeRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
