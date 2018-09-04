<?php

namespace App\Containers\MerchantFeeMap\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindMerchantFeeMapByIdAction extends Action
{
    public function run(Request $request)
    {
        $merchantfeemap = Apiato::call('MerchantFeeMap@FindMerchantFeeMapByIdTask', [$request->id]);

        return $merchantfeemap;
    }
}
