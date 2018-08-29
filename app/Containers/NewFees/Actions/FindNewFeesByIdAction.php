<?php

namespace App\Containers\NewFees\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindNewFeesByIdAction extends Action
{
    public function run(Request $request)
    {
        $newfees = Apiato::call('NewFees@FindNewFeesByIdTask', [$request->id]);

        return $newfees;
    }
}
