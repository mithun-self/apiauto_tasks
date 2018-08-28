<?php

namespace App\Containers\Merchant\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccountsRepository
 */
class AccountsRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
