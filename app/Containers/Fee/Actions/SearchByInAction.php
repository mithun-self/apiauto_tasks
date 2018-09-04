<?php

namespace App\Containers\Fee\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class SearchByInAction extends Action
{
    public function run(Request $request)
    {
    	//return $request;
        $fee = Apiato::call('Fee@SearchByInTask', [$request->id]);

        return $fee;
    }
}
