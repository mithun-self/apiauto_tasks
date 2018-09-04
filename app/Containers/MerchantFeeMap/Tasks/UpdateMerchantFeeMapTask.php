<?php

namespace App\Containers\MerchantFeeMap\Tasks;

use App\Containers\MerchantFeeMap\Data\Repositories\MerchantFeeMapRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateMerchantFeeMapTask extends Task
{

    private $repository;

    public function __construct(MerchantFeeMapRepository $repository)
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
