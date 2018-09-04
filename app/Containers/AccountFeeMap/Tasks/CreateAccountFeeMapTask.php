<?php

namespace App\Containers\AccountFeeMap\Tasks;

use App\Containers\AccountFeeMap\Data\Repositories\AccountFeeMapRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccountFeeMapTask extends Task
{

    private $repository;

    public function __construct(AccountFeeMapRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
