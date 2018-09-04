<?php

namespace App\Containers\AccountFeeMap\Tasks;

use App\Containers\AccountFeeMap\Data\Repositories\AccountFeeMapRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccountFeeMapByIdTask extends Task
{

    private $repository;

    public function __construct(AccountFeeMapRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
