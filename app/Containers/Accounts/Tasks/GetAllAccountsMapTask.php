<?php

namespace App\Containers\Accounts\Tasks;

use App\Containers\Accounts\Data\Repositories\AccountsRepository;
use App\Ship\Parents\Tasks\Task;
use App\Ship\Criterias\Eloquent\CountCriteria;
use App\Ship\Criterias\Eloquent\GetFeesIdForAccountsCriteria;
use App\Containers\AccountFeeMap\Data\Repositories\AccountFeeMapRepository;

class GetAllAccountsMapTask extends Task
{

    private $repository;

    public function __construct(AccountsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        $account_from_merchant_id = $this->repository->pluck('id');
        //$account_count = $this->repository->pushCriteria(new CountCriteria($this->repository->id));
        $account_count_for_merchant = $this->repository->pluck('id')->count();

        /*$get_fees_id_for_accounts = $AccountFeeMapRepository->whereIn('account_id',$account_from_merchant_id)->groupBy('fees_id')->having(DB::raw('COUNT(DISTINCT `account_fees`.`account_id`)'),'=', $account_count_for_merchant)->pluck('fees_id');*/
        return ['account_from_merchant_id'=> $account_from_merchant_id,'account_count_for_merchant'=>$account_count_for_merchant];

    }
}
