<?php

namespace App\Containers\Accounts\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAccountsAction extends Action
{
    public function run(Request $request)
    {
        $accounts = Apiato::call('Accounts@GetAllAccountsTask');

        return $accounts;
    }
}
