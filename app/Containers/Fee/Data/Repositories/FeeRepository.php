<?php

namespace App\Containers\Fee\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;
use App\Containers\Fee\Models\Fee;
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

    public function custom($accounts){

    	return Fee::whereIn('id',$accounts)->get();
    }

}
