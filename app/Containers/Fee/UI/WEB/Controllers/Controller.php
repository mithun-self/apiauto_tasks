<?php

namespace App\Containers\Fee\UI\WEB\Controllers;

use App\Containers\Fee\UI\WEB\Requests\CreateFeeRequest;
use App\Containers\Fee\UI\WEB\Requests\DeleteFeeRequest;
use App\Containers\Fee\UI\WEB\Requests\GetAllFeesRequest;
use App\Containers\Fee\UI\WEB\Requests\FindFeeByIdRequest;
use App\Containers\Fee\UI\WEB\Requests\UpdateFeeRequest;
use App\Containers\Fee\UI\WEB\Requests\StoreFeeRequest;
use App\Containers\Fee\UI\WEB\Requests\EditFeeRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Fee\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllFeesRequest $request
     */
    public function index(GetAllFeesRequest $request)
    {
        $fees = Apiato::call('Fee@GetAllFeesAction', [$request]);
        return view('fee::all_fees')->with(compact('fees'));
        // ..
    }

    /**
     * Show one entity
     *
     * @param FindFeeByIdRequest $request
     */
    public function show(FindFeeByIdRequest $request)
    {
        $fee = Apiato::call('Fee@FindFeeByIdAction', [$request]);
        return $fee;
        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateFeeRequest $request
     */
    public function create(CreateFeeRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreFeeRequest $request
     */
    public function store(StoreFeeRequest $request)
    {
        $fee = Apiato::call('Fee@CreateFeeAction', [$request]);
        return $fee;
        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditFeeRequest $request
     */
    public function edit(EditFeeRequest $request)
    {
        $fee = Apiato::call('Fee@GetFeeByIdAction', [$request]);
        return $fee;
        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateFeeRequest $request
     */
    public function update(UpdateFeeRequest $request)
    {
        $fee = Apiato::call('Fee@UpdateFeeAction', [$request]);
        return $fee;
        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteFeeRequest $request
     */
    public function delete(DeleteFeeRequest $request)
    {
         $result = Apiato::call('Fee@DeleteFeeAction', [$request]);
         return $result;
         // ..
    }
}
