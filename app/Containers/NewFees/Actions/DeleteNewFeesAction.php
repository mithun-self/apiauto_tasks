<?php

namespace App\Containers\NewFees\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteNewFeesAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('NewFees@DeleteNewFeesTask', [$request->id]);
    }
}
