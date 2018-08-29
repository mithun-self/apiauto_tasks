<?php

namespace App\Containers\NewFees\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllNewFeesAction extends Action
{
    public function run(Request $request)
    {
        $newfees = Apiato::call('NewFees@GetAllNewFeesTask');

        return $newfees;
    }
}
