<?php

namespace App\Containers\MerchantFeeMap\Tasks;

use App\Containers\MerchantFeeMap\Data\Repositories\MerchantFeeMapRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateMerchantFeeMapTask extends Task
{

    private $repository;

    public function __construct(MerchantFeeMapRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
