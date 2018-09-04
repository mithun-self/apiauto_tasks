<?php

namespace App\Containers\AccountFeeMap\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccountFeeMapAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $accountfeemap = Apiato::call('AccountFeeMap@CreateAccountFeeMapTask', [$data]);

        return $accountfeemap;
    }
}
