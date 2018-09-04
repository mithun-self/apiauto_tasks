<?php

namespace App\Containers\AccountFeeMap\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccountFeeMapsAction extends Action
{
    public function run(Request $request)
    {
        $accountfeemaps = Apiato::call('AccountFeeMap@GetAllAccountFeeMapsTask');

        return $accountfeemaps;
    }
}
