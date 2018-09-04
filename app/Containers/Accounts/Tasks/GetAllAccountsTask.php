<?php

namespace App\Containers\Accounts\Tasks;

use App\Containers\Accounts\Data\Repositories\AccountsRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccountsTask extends Task
{

    private $repository;

    public function __construct(AccountsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
