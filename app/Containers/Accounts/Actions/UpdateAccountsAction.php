<?php

namespace App\Containers\Accounts\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAccountsAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $accounts = Apiato::call('Accounts@UpdateAccountsTask', [$request->id, $data]);

        return $accounts;
    }
}
