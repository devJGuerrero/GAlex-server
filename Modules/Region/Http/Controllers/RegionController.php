<?php

namespace Modules\Region\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Region\Repositories\Region;
use Modules\Region\Transformers\Resource;
use Modules\Region\Http\Requests\Validate;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Region $region
     * @return AnonymousResourceCollection
     */
    public function index(Region $region)
    {
        return Resource::collection(
            $region->getItems()
        );
    }

    /**
     * Show the specified resource.
     *
     * @param int $id
     * @param Region $region
     * @return Resource
     */
    public function show($id, Region $region)
    {
        return new Resource(
            $region->getItem($id)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Validate $request
     * @param Region $region
     * @return Resource
     */
    public function store(Validate $request, Region $region)
    {
        return new Resource(
            $region->createItem($request->all())
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Validate $request
     * @param int $id
     * @param Region $region
     * @return Resource
     */
    public function update(Validate $request, $id, Region $region)
    {
        return new Resource(
            $region->updateItem($id, $request->all())
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param Region $region
     * @return Resource
     */
    public function destroy($id, Region $region)
    {
        return new Resource(
            $region->destroyItem($id)
        );
    }
}
