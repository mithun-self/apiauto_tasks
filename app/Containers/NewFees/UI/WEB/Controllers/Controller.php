<?php

namespace App\Containers\NewFees\UI\WEB\Controllers;

use App\Containers\NewFees\UI\WEB\Requests\CreateNewFeesRequest;
use App\Containers\NewFees\UI\WEB\Requests\DeleteNewFeesRequest;
use App\Containers\NewFees\UI\WEB\Requests\GetAllNewFeesRequest;
use App\Containers\NewFees\UI\WEB\Requests\FindNewFeesByIdRequest;
use App\Containers\NewFees\UI\WEB\Requests\UpdateNewFeesRequest;
use App\Containers\NewFees\UI\WEB\Requests\StoreNewFeesRequest;
use App\Containers\NewFees\UI\WEB\Requests\EditNewFeesRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\NewFees\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllNewFeesRequest $request
     */
    public function index(GetAllNewFeesRequest $request)
    {
        $newfees = Apiato::call('NewFees@GetAllNewFeesAction', [$request]);
        return view('newfees::all_fees')->with(compact('newfees'));
        // ..
    }

    /**
     * Show one entity
     *
     * @param FindNewFeesByIdRequest $request
     */
    public function show(FindNewFeesByIdRequest $request)
    {
        $newfees = Apiato::call('NewFees@FindNewFeesByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateNewFeesRequest $request
     */
    public function create(CreateNewFeesRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreNewFeesRequest $request
     */
    public function store(StoreNewFeesRequest $request)
    {
        $newfees = Apiato::call('NewFees@CreateNewFeesAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditNewFeesRequest $request
     */
    public function edit(EditNewFeesRequest $request)
    {
        $newfees = Apiato::call('NewFees@GetNewFeesByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateNewFeesRequest $request
     */
    public function update(UpdateNewFeesRequest $request)
    {
        $newfees = Apiato::call('NewFees@UpdateNewFeesAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteNewFeesRequest $request
     */
    public function delete(DeleteNewFeesRequest $request)
    {
         $result = Apiato::call('NewFees@DeleteNewFeesAction', [$request]);

         // ..
    }
}
