<?php

namespace App\Containers\Fee\Tasks;

use App\Containers\Fee\Data\Repositories\FeeRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateFeeTask extends Task
{

    private $repository;

    public function __construct(FeeRepository $repository)
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
