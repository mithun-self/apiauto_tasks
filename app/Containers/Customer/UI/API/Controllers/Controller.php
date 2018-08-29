<?php

namespace App\Containers\Customer\UI\API\Controllers;

use App\Containers\Customer\UI\API\Requests\CreateCustomerRequest;
use App\Containers\Customer\UI\API\Requests\DeleteCustomerRequest;
use App\Containers\Customer\UI\API\Requests\GetAllCustomersRequest;
use App\Containers\Customer\UI\API\Requests\FindCustomerByIdRequest;
use App\Containers\Customer\UI\API\Requests\UpdateCustomerRequest;
use App\Containers\Customer\UI\API\Transformers\CustomerTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Customer\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateCustomerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCustomer(CreateCustomerRequest $request)
    {
        $customer = Apiato::call('Customer@CreateCustomerAction', [$request]);

        return $this->created($this->transform($customer, CustomerTransformer::class));
    }

    /**
     * @param FindCustomerByIdRequest $request
     * @return array
     */
    public function findCustomerById(FindCustomerByIdRequest $request)
    {
        $customer = Apiato::call('Customer@FindCustomerByIdAction', [$request]);

        return $this->transform($customer, CustomerTransformer::class);
    }

    /**
     * @param GetAllCustomersRequest $request
     * @return array
     */
    public function getAllCustomers(GetAllCustomersRequest $request)
    {
       // return "Find All Customers";
        $customers = Apiato::call('Customer@GetAllCustomersAction', [$request]);

        return $this->transform($customers, CustomerTransformer::class);
    }

    /**
     * @param UpdateCustomerRequest $request
     * @return array
     */
    public function updateCustomer(UpdateCustomerRequest $request)
    {
        $customer = Apiato::call('Customer@UpdateCustomerAction', [$request]);

        return $this->transform($customer, CustomerTransformer::class);
    }

    /**
     * @param DeleteCustomerRequest $request
     * @return \Illuminate/\Http\JsonResponse
     */
    public function deleteCustomer(DeleteCustomerRequest $request)
    {
        Apiato::call('Customer@DeleteCustomerAction', [$request]);

        return $this->noContent();
    }
}
