<?php

namespace App\Containers\AccountFeeMap\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class AccountFeeMapAction extends Action
{
    public function run(Request $request)
    {
        $accountfeemap = Apiato::call('AccountFeeMap@AccountFeeMapTask', [$request->id]);

        return $accountfeemap;
    }
}
