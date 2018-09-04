<?php

namespace App\Containers\AccountFeeMap\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccountFeeMapAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $accountfeemap = Apiato::call('AccountFeeMap@UpdateAccountFeeMapTask', [$request->id, $data]);

        return $accountfeemap;
    }
}
