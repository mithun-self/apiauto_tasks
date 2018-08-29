<?php

namespace App\Containers\NewFees\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateNewFeesAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $newfees = Apiato::call('NewFees@UpdateNewFeesTask', [$request->id, $data]);

        return $newfees;
    }
}
