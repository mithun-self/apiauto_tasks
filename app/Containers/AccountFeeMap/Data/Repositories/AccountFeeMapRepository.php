<?php

namespace App\Containers\AccountFeeMap\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;
use App\Containers\AccountFeeMap\Models\AccountFeeMap;
use DB;
/**
 * Class AccountFeeMapRepository
 */
class AccountFeeMapRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'account_id' => '=',
        // ...
    ];

    public function GetFeesIdForAccount($accounts){

    	$get_fees_id_for_accounts = AccountFeeMap::whereIn('account_id',$accounts['account_from_merchant_id'])->groupBy('fees_id')->having(DB::raw('COUNT(DISTINCT `account_fees`.`account_id`)'),'=', $accounts['account_count_for_merchant'])->pluck('fees_id')->toArray();

        return $get_fees_id_for_accounts;

    }

}
