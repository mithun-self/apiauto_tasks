<?php

namespace App\Containers\Merchant\UI\API\Controllers;


use App\Containers\Merchant\Models\MerchantModel;
use App\Ship\Parents\Controllers\ApiController;
use App\Containers\Merchant\Models\Accounts;
use Illuminate\Http\Request;

class MerchantController extends ApiController
{

    public function getAllMerchants()
    {

    	$merchants = MerchantModel::all();
    	return response()->json($merchants);
    }

    public function SpecificMerchantDetails($id){
    	$merchant_details = Accounts::where('merchant_id', $id)->get();
    	//return view('merchant::merchant_details', ['merchant_details' => $merchant_details]);
    	return response()->json($merchant_details);
    }

    public function PostAllMerchants(Request $request){
        $input = $request->all();
        return response()->json($input);

    }

}
