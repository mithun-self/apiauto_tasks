<?php

namespace App\Containers\AccountFeeMap\Tasks;

use App\Containers\AccountFeeMap\Data\Repositories\AccountFeeMapRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use DB;
use App\Containers\AccountFeeMap\Models\AccountFeeMap;

class AccountFeeMapTask extends Task
{

    private $repository;

    public function __construct(AccountFeeMapRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($accounts)
    {
        try {
            /*$get_fees_id_for_accounts = AccountFeeMapRepository::FindwhereIn('account_id',$accounts['account_from_merchant_id'])->groupBy('fees_id')->having(DB::raw('COUNT(DISTINCT `account_fees`.`account_id`)'),'=', $accounts['account_count_for_merchant'])->pluck('fees_id');*/
            return $this->repository->GetFeesIdForAccount($accounts);
            //->having(DB::raw('COUNT(DISTINCT `account_fees`.`account_id`)'),'=', 4);
            /*$get_fees_id_for_accounts = AccountFeeMap::whereIn('account_id',$accounts['account_from_merchant_id'])->groupBy('fees_id')->having(DB::raw('COUNT(DISTINCT `account_fees`.`account_id`)'),'=', $accounts['account_count_for_merchant'])->pluck('fees_id')->toArray();
            return $get_fees_id_for_accounts;*/
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
