<?php

namespace App\Containers\Accounts\Tasks;

use App\Containers\Accounts\Data\Repositories\AccountsRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccountsTask extends Task
{

    private $repository;

    public function __construct(AccountsRepository $repository)
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
