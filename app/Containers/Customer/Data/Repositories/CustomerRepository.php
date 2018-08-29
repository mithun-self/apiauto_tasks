<?php

namespace App\Containers\Customer\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class CustomerRepository
 */
class CustomerRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => 'like',
        'email'=>'like',
        'description' => 'like',
        'name'        => 'like'
    ];

}
