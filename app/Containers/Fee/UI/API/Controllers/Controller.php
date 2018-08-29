<?php

namespace App\Containers\Fee\UI\API\Controllers;

use App\Containers\Fee\UI\API\Requests\CreateFeeRequest;
use App\Containers\Fee\UI\API\Requests\DeleteFeeRequest;
use App\Containers\Fee\UI\API\Requests\GetAllFeesRequest;
use App\Containers\Fee\UI\API\Requests\FindFeeByIdRequest;
use App\Containers\Fee\UI\API\Requests\UpdateFeeRequest;
use App\Containers\Fee\UI\API\Transformers\FeeTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Fee\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateFeeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createFee(CreateFeeRequest $request)
    {
        $fee = Apiato::call('Fee@CreateFeeAction', [$request]);

        return $this->created($this->transform($fee, FeeTransformer::class));
    }

    /**
     * @param FindFeeByIdRequest $request
     * @return array
     */
    public function findFeeById(FindFeeByIdRequest $request)
    {
        $fee = Apiato::call('Fee@FindFeeByIdAction', [$request]);

        return $this->transform($fee, FeeTransformer::class);
    }

    /**
     * @param GetAllFeesRequest $request
     * @return array
     */
    public function getAllFees(GetAllFeesRequest $request)
    {
        $fees = Apiato::call('Fee@GetAllFeesAction', [$request]);

        return $this->transform($fees, FeeTransformer::class);
    }

    /**
     * @param UpdateFeeRequest $request
     * @return array
     */
    public function updateFee(UpdateFeeRequest $request)
    {
        $fee = Apiato::call('Fee@UpdateFeeAction', [$request]);

        return $this->transform($fee, FeeTransformer::class);
    }

    /**
     * @param DeleteFeeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteFee(DeleteFeeRequest $request)
    {
        Apiato::call('Fee@DeleteFeeAction', [$request]);

        return $this->noContent();
    }
}
