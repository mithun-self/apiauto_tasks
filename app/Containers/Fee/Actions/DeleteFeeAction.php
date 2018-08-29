<?php

namespace App\Containers\Fee\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteFeeAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Fee@DeleteFeeTask', [$request->id]);
    }
}
