<?php

namespace App\Containers\Accounts\Tasks;

use App\Containers\Accounts\Data\Repositories\AccountsRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccountsByIdTask extends Task
{

    private $repository;

    public function __construct(AccountsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id,Request $request)
    {
        try {
               return $this->repository->find($id);          
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
