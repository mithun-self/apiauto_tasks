<?php

namespace App\Containers\Accounts\Data\Repositories;

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
        'merchant_id' => '=',
        // ...
    ];

}
