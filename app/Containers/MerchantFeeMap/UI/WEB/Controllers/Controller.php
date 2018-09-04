<?php

namespace App\Containers\MerchantFeeMap\UI\WEB\Controllers;

use App\Containers\MerchantFeeMap\UI\WEB\Requests\CreateMerchantFeeMapRequest;
use App\Containers\MerchantFeeMap\UI\WEB\Requests\DeleteMerchantFeeMapRequest;
use App\Containers\MerchantFeeMap\UI\WEB\Requests\GetAllMerchantFeeMapsRequest;
use App\Containers\MerchantFeeMap\UI\WEB\Requests\FindMerchantFeeMapByIdRequest;
use App\Containers\MerchantFeeMap\UI\WEB\Requests\UpdateMerchantFeeMapRequest;
use App\Containers\MerchantFeeMap\UI\WEB\Requests\StoreMerchantFeeMapRequest;
use App\Containers\MerchantFeeMap\UI\WEB\Requests\EditMerchantFeeMapRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\MerchantFeeMap\UI\WEB\Requests\AccountsFromMerchantRequest;
use App\Containers\MerchantFeeMap\UI\WEB\Requests\FeeByAccount;

/**
 * Class Controller
 *
 * @package App\Containers\MerchantFeeMap\UI\WEB\Controllers
 */
class Controller extends WebController
{
    public function RedirectToView(){
        return view('merchantfeemap::merchant_fee_map');
    }
    /**
     * Show all entities
     *
     * @param GetAllMerchantFeeMapsRequest $request
     */
    public function index(GetAllMerchantFeeMapsRequest $request)
    {
        $merchantfeemaps = Apiato::call('MerchantFeeMap@GetAllMerchantFeeMapsAction', [$request]);
        //return view('merchantfeemap::merchant_fee_map');
        return $merchantfeemaps;
        // ..
    }

    /**
     * Show one entity
     *
     * @param FindMerchantFeeMapByIdRequest $request
     */
    public function show(FindMerchantFeeMapByIdRequest $request)
    {
        $merchantfeemap = Apiato::call('MerchantFeeMap@FindMerchantFeeMapByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateMerchantFeeMapRequest $request
     */
    public function create(CreateMerchantFeeMapRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreMerchantFeeMapRequest $request
     */
    public function store(StoreMerchantFeeMapRequest $request)
    {
        $merchantfeemap = Apiato::call('MerchantFeeMap@CreateMerchantFeeMapAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditMerchantFeeMapRequest $request
     */
    public function edit(EditMerchantFeeMapRequest $request)
    {
        $merchantfeemap = Apiato::call('MerchantFeeMap@GetMerchantFeeMapByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateMerchantFeeMapRequest $request
     */
    public function update(UpdateMerchantFeeMapRequest $request)
    {
        $merchantfeemap = Apiato::call('MerchantFeeMap@UpdateMerchantFeeMapAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteMerchantFeeMapRequest $request
     */
    public function delete(DeleteMerchantFeeMapRequest $request)
    {
         $result = Apiato::call('MerchantFeeMap@DeleteMerchantFeeMapAction', [$request]);

         // ..
    }

     public function AccountsFromMerchant(AccountsFromMerchantRequest $request){
         $accounts = Apiato::call('Accounts@GetAccountBasedOnMerchantAction', [$request]);
         return $accounts;
     }

     public function FeeByAccountForMap(FeeByAccount $request){

        if($request->merchant_id == 0 && $request->account_id == 0){
            $account_from_merchant_id = Apiato::call('Accounts@GetAccountsForMapAction', [$request]);
            return $account_from_merchant_id;
        }else{
            $account_from_merchant_id = Apiato::call('Accounts@GetAccountsForMapAction', [$request]);
            return $account_from_merchant_id;
        }

     }
}
