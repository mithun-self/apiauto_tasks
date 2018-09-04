<?php

namespace App\Containers\MerchantFeeMap\Tasks;

use App\Containers\MerchantFeeMap\Data\Repositories\MerchantFeeMapRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllMerchantFeeMapsTask extends Task
{

    private $repository;

    public function __construct(MerchantFeeMapRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
