<?php

namespace App\Containers\MerchantFeeMap\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteMerchantFeeMapAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('MerchantFeeMap@DeleteMerchantFeeMapTask', [$request->id]);
    }
}
