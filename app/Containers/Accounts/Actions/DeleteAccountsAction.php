<?php

namespace App\Containers\Accounts\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccountsAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Accounts@DeleteAccountsTask', [$request->id]);
    }
}
