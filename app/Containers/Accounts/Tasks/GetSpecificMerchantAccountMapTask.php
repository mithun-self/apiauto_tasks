<?php

namespace App\Containers\Accounts\Tasks;

use App\Containers\Accounts\Data\Repositories\AccountsRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class GetSpecificMerchantAccountMapTask extends Task
{

    private $repository;

    public function __construct(AccountsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($merchant_id)
    {
        try {
            $account_from_merchant_id = $this->repository->findByField('merchant_id',$merchant_id)->pluck('id');
            $account_count_for_merchant = $this->repository->findByField('merchant_id',$merchant_id)->count();
            return ['account_from_merchant_id'=> $account_from_merchant_id,'account_count_for_merchant'=>$account_count_for_merchant];
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
