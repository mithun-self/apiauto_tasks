<?php

namespace App\Containers\Fee\Tasks;

use App\Containers\Fee\Data\Repositories\FeeRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllFeesTask extends Task
{

    private $repository;

    public function __construct(FeeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate(5);
    }
}
