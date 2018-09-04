<?php

namespace App\Containers\AccountFeeMap\Tasks;

use App\Containers\AccountFeeMap\Data\Repositories\AccountFeeMapRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccountFeeMapsTask extends Task
{

    private $repository;

    public function __construct(AccountFeeMapRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
