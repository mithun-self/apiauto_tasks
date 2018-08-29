<?php

namespace App\Containers\NewFees\Tasks;

use App\Containers\NewFees\Data\Repositories\NewFeesRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateNewFeesTask extends Task
{

    private $repository;

    public function __construct(NewFeesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
