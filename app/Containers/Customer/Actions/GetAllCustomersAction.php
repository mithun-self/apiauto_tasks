<?php

namespace App\Containers\Customer\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllCustomersAction extends Action
{
    public function run(Request $request)
    {
        $user = $request->user();

     /*   $account = $user->account;
        $merchant = $user->merchant;
        $account_id = $account->id;
        $merchant_id = $merchant->id;*/


        $customers = Apiato::call('Customer@GetAllCustomersTask', [], ['addRequestCriteria']);

        return $customers;
    }
}
