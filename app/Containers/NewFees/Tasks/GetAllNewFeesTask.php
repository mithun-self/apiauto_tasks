<?php

namespace App\Containers\NewFees\Tasks;

use App\Containers\NewFees\Data\Repositories\NewFeesRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllNewFeesTask extends Task
{

    private $repository;

    public function __construct(NewFeesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
