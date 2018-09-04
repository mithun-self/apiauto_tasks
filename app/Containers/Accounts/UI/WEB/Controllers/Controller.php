<?php

namespace App\Containers\Accounts\UI\WEB\Controllers;

use App\Containers\Accounts\UI\WEB\Requests\CreateAccountsRequest;
use App\Containers\Accounts\UI\WEB\Requests\DeleteAccountsRequest;
use App\Containers\Accounts\UI\WEB\Requests\GetAllAccountsRequest;
use App\Containers\Accounts\UI\WEB\Requests\FindAccountsByIdRequest;
use App\Containers\Accounts\UI\WEB\Requests\UpdateAccountsRequest;
use App\Containers\Accounts\UI\WEB\Requests\StoreAccountsRequest;
use App\Containers\Accounts\UI\WEB\Requests\EditAccountsRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Accounts\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllAccountsRequest $request
     */
    public function index(GetAllAccountsRequest $request)
    {
        $accounts = Apiato::call('Accounts@GetAllAccountsAction', [$request]);

        // ..
    }

    /**
     * Show one entity
     *
     * @param FindAccountsByIdRequest $request
     */
    public function show(FindAccountsByIdRequest $request)
    {
        $accounts = Apiato::call('Accounts@FindAccountsByIdAction', [$request]);
        return $accounts;
        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateAccountsRequest $request
     */
    public function create(CreateAccountsRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreAccountsRequest $request
     */
    public function store(StoreAccountsRequest $request)
    {
        $accounts = Apiato::call('Accounts@CreateAccountsAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditAccountsRequest $request
     */
    public function edit(EditAccountsRequest $request)
    {
        $accounts = Apiato::call('Accounts@GetAccountsByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateAccountsRequest $request
     */
    public function update(UpdateAccountsRequest $request)
    {
        $accounts = Apiato::call('Accounts@UpdateAccountsAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteAccountsRequest $request
     */
    public function delete(DeleteAccountsRequest $request)
    {
         $result = Apiato::call('Accounts@DeleteAccountsAction', [$request]);

         // ..
    }
}
