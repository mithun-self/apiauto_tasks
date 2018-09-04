<?php

namespace App\Containers\AccountFeeMap\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccountFeeMapAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('AccountFeeMap@DeleteAccountFeeMapTask', [$request->id]);
    }
}
