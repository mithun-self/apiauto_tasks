<?php

namespace App\Containers\Fee\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateFeeAction extends Action
{
    public function run(Request $request)
    {
        $data = [
            // add your request data here
            'name'  => $request->fee_name,
   			'type'  => $request->fee_type,
   			'value' => $request->fee_value,
        ];

        $fee = Apiato::call('Fee@UpdateFeeTask', [$request->id, $data]);

        return $fee;
    }
}
