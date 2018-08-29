<?php

namespace App\Containers\NewFees\Tasks;

use App\Containers\NewFees\Data\Repositories\NewFeesRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateNewFeesTask extends Task
{

    private $repository;

    public function __construct(NewFeesRepository $repository)
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
