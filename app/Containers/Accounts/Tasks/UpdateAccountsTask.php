<?php

namespace App\Containers\Accounts\Tasks;

use App\Containers\Accounts\Data\Repositories\AccountsRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccountsTask extends Task
{

    private $repository;

    public function __construct(AccountsRepository $repository)
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
