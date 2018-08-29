<?php

namespace App\Containers\NewFees\UI\API\Controllers;

use App\Containers\NewFees\UI\API\Requests\CreateNewFeesRequest;
use App\Containers\NewFees\UI\API\Requests\DeleteNewFeesRequest;
use App\Containers\NewFees\UI\API\Requests\GetAllNewFeesRequest;
use App\Containers\NewFees\UI\API\Requests\FindNewFeesByIdRequest;
use App\Containers\NewFees\UI\API\Requests\UpdateNewFeesRequest;
use App\Containers\NewFees\UI\API\Transformers\NewFeesTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\NewFees\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateNewFeesRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createNewFees(CreateNewFeesRequest $request)
    {
        $newfees = Apiato::call('NewFees@CreateNewFeesAction', [$request]);

        return $this->created($this->transform($newfees, NewFeesTransformer::class));
    }

    /**
     * @param FindNewFeesByIdRequest $request
     * @return array
     */
    public function findNewFeesById(FindNewFeesByIdRequest $request)
    {
        $newfees = Apiato::call('NewFees@FindNewFeesByIdAction', [$request]);

        return $this->transform($newfees, NewFeesTransformer::class);
    }

    /**
     * @param GetAllNewFeesRequest $request
     * @return array
     */
    public function getAllNewFees(GetAllNewFeesRequest $request)
    {
        $newfees = Apiato::call('NewFees@GetAllNewFeesAction', [$request]);

        return $this->transform($newfees, NewFeesTransformer::class);
    }

    /**
     * @param UpdateNewFeesRequest $request
     * @return array
     */
    public function updateNewFees(UpdateNewFeesRequest $request)
    {
        $newfees = Apiato::call('NewFees@UpdateNewFeesAction', [$request]);

        return $this->transform($newfees, NewFeesTransformer::class);
    }

    /**
     * @param DeleteNewFeesRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteNewFees(DeleteNewFeesRequest $request)
    {
        Apiato::call('NewFees@DeleteNewFeesAction', [$request]);

        return $this->noContent();
    }
}
