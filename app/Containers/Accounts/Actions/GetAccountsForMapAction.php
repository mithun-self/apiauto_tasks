<?php

namespace App\Containers\Accounts\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAccountsForMapAction extends Action
{
    public function run(Request $request)
    {
        $accounts = Apiato::call('Accounts@GetAllAccountsMapTask');
        $get_fees_id_for_all_accounts = Apiato::call('AccountFeeMap@AccountFeeMapTask',[$accounts]);
        $selected_fee_id = Apiato::call('Fee@SearchByInTask', [$get_fees_id_for_all_accounts]);
        $not_selected_fee_id = Apiato::call('Fee@SearchByNotInTask', [$get_fees_id_for_all_accounts]);
        return ['selectd_fee'=>$selected_fee_id, 'unselected_fee'=>$not_selected_fee_id];
    }
}
