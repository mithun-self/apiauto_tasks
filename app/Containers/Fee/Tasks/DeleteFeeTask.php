<?php

namespace App\Containers\Fee\Tasks;

use App\Containers\Fee\Data\Repositories\FeeRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteFeeTask extends Task
{

    private $repository;

    public function __construct(FeeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            $this->repository->delete($id);
            return 'true';
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
