<?php

namespace App\Containers\Fee\Tasks;

use App\Containers\Fee\Data\Repositories\FeeRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateFeeTask extends Task
{

    private $repository;

    public function __construct(FeeRepository $repository)
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
