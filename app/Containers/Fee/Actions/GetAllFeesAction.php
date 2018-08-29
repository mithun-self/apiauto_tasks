<?php

namespace App\Containers\Fee\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllFeesAction extends Action
{
    public function run(Request $request)
    {
        $fees = Apiato::call('Fee@GetAllFeesTask');

        return $fees;
    }
}
