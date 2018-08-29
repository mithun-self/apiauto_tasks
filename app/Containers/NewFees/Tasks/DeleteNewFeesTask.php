<?php

namespace App\Containers\NewFees\Tasks;

use App\Containers\NewFees\Data\Repositories\NewFeesRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteNewFeesTask extends Task
{

    private $repository;

    public function __construct(NewFeesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
