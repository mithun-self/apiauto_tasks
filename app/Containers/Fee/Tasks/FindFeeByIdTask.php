<?php

namespace App\Containers\Fee\Tasks;

use App\Containers\Fee\Data\Repositories\FeeRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindFeeByIdTask extends Task
{

    private $repository;

    public function __construct(FeeRepository $repository)
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
