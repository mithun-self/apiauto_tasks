<?php

namespace App\Containers\Customer\Tasks;

use App\Containers\Customer\Data\Repositories\CustomerRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateCustomerTask extends Task
{

    protected $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException($exception->getMessage());
        }
    }
}
