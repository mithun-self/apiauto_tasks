<?php

namespace App\Containers\MerchantFeeMap\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllMerchantFeeMapsAction extends Action
{
    public function run(Request $request)
    {
        $merchantfeemaps = Apiato::call('MerchantFeeMap@GetAllMerchantFeeMapsTask');

        return $merchantfeemaps;
    }
}
