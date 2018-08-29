<?php

namespace App\Containers\Fee\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindFeeByIdAction extends Action
{
    public function run(Request $request)
    {
        $fee = Apiato::call('Fee@FindFeeByIdTask', [$request->id]);

        return $fee;
    }
}
