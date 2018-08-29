<?php

namespace App\Containers\Customer\Tasks;

use App\Containers\Customer\Data\Repositories\CustomerRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateCustomerTask extends Task
{

    protected $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException($exception->getMessage());
        }
    }
}
