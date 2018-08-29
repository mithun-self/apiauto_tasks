<?php

namespace App\Containers\NewFees\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateNewFeesAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $newfees = Apiato::call('NewFees@CreateNewFeesTask', [$data]);

        return $newfees;
    }
}
