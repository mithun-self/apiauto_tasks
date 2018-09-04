<?php

namespace App\Containers\Accounts\Tasks;

use App\Containers\Accounts\Data\Repositories\AccountsRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use App\Ship\Criterias\Eloquent\GetaccountsformerchantCriteria;

class FindAccountsByIdMerchantTask extends Task
{

    private $repository;

    public function __construct(AccountsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->findByField('merchant_id',$id);
            //return $this->repository->pushCriteria(new GetaccountsformerchantCriteria);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
