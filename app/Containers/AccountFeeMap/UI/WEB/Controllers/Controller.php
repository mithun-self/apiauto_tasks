<?php

namespace App\Containers\AccountFeeMap\UI\WEB\Controllers;

use App\Containers\AccountFeeMap\UI\WEB\Requests\CreateAccountFeeMapRequest;
use App\Containers\AccountFeeMap\UI\WEB\Requests\DeleteAccountFeeMapRequest;
use App\Containers\AccountFeeMap\UI\WEB\Requests\GetAllAccountFeeMapsRequest;
use App\Containers\AccountFeeMap\UI\WEB\Requests\FindAccountFeeMapByIdRequest;
use App\Containers\AccountFeeMap\UI\WEB\Requests\UpdateAccountFeeMapRequest;
use App\Containers\AccountFeeMap\UI\WEB\Requests\StoreAccountFeeMapRequest;
use App\Containers\AccountFeeMap\UI\WEB\Requests\EditAccountFeeMapRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AccountFeeMap\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllAccountFeeMapsRequest $request
     */
    public function index(GetAllAccountFeeMapsRequest $request)
    {
        $accountfeemaps = Apiato::call('AccountFeeMap@GetAllAccountFeeMapsAction', [$request]);

        // ..
    }

    /**
     * Show one entity
     *
     * @param FindAccountFeeMapByIdRequest $request
     */
    public function show(FindAccountFeeMapByIdRequest $request)
    {
        $accountfeemap = Apiato::call('AccountFeeMap@FindAccountFeeMapByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateAccountFeeMapRequest $request
     */
    public function create(CreateAccountFeeMapRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreAccountFeeMapRequest $request
     */
    public function store(StoreAccountFeeMapRequest $request)
    {
        $accountfeemap = Apiato::call('AccountFeeMap@CreateAccountFeeMapAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditAccountFeeMapRequest $request
     */
    public function edit(EditAccountFeeMapRequest $request)
    {
        $accountfeemap = Apiato::call('AccountFeeMap@GetAccountFeeMapByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateAccountFeeMapRequest $request
     */
    public function update(UpdateAccountFeeMapRequest $request)
    {
        $accountfeemap = Apiato::call('AccountFeeMap@UpdateAccountFeeMapAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteAccountFeeMapRequest $request
     */
    public function delete(DeleteAccountFeeMapRequest $request)
    {
         $result = Apiato::call('AccountFeeMap@DeleteAccountFeeMapAction', [$request]);

         // ..
    }
}
