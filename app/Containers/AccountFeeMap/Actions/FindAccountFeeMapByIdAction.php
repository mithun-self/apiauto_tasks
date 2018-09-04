<?php

namespace App\Containers\AccountFeeMap\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccountFeeMapByIdAction extends Action
{
    public function run(Request $request)
    {
        $accountfeemap = Apiato::call('AccountFeeMap@FindAccountFeeMapByIdTask', [$request->id]);

        return $accountfeemap;
    }
}
