<?php

namespace App\Containers\Customer\UI\WEB\Controllers;

use App\Containers\Customer\UI\WEB\Requests\CreateCustomerRequest;
use App\Containers\Customer\UI\WEB\Requests\DeleteCustomerRequest;
use App\Containers\Customer\UI\WEB\Requests\GetAllCustomersRequest;
use App\Containers\Customer\UI\WEB\Requests\FindCustomerByIdRequest;
use App\Containers\Customer\UI\WEB\Requests\UpdateCustomerRequest;
use App\Containers\Customer\UI\WEB\Requests\StoreCustomerRequest;
use App\Containers\Customer\UI\WEB\Requests\EditCustomerRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Customer\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllCustomersRequest $request
     */
    public function index(GetAllCustomersRequest $request)
    {
        //$customers = Apiato::call('Customer@GetAllCustomersAction', [$request]);
        return view('customer::index');
        
    }
    /**
     * Show all entities
     *
     * @param GetAllCustomersRequest $request
     */
    public function planbill(GetAllCustomersRequest $request)
    {
        //$customers = Apiato::call('Customer@GetAllCustomersAction', [$request]);
        
        return view('customer::planbill',compact('request'));
        
    }

    /**
     * Show one entity
     *
     * @param FindCustomerByIdRequest $request
     */
    public function show(FindCustomerByIdRequest $request)
    {
        $customer = Apiato::call('Customer@FindCustomerByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateCustomerRequest $request
     */
    public function create(CreateCustomerRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreCustomerRequest $request
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = Apiato::call('Customer@CreateCustomerAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditCustomerRequest $request
     */
    public function edit(EditCustomerRequest $request)
    {
        $customer = Apiato::call('Customer@GetCustomerByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateCustomerRequest $request
     */
    public function update(UpdateCustomerRequest $request)
    {
        $customer = Apiato::call('Customer@UpdateCustomerAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteCustomerRequest $request
     */
    public function delete(DeleteCustomerRequest $request)
    {
         $result = Apiato::call('Customer@DeleteCustomerAction', [$request]);

         // ..
    }
}
