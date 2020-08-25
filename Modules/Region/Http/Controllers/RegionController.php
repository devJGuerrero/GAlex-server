<?php

namespace Modules\Region\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Region\Http\Requests\RegionRequest;
use Modules\Region\Transformers\RegionResource;
use Modules\Region\Repositories\RegionRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param RegionRepository $region
     * @return AnonymousResourceCollection
     */
    public function index(RegionRepository $region): AnonymousResourceCollection
    {
        return RegionResource::collection($region->getItems());
    }

    /**
     * Show the specified resource.
     *
     * @param string $id
     * @param RegionRepository $region
     * @return RegionResource
     */
    public function show(string $id, RegionRepository $region): RegionResource
    {
        return new RegionResource($region->getItem($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RegionRequest $request
     * @param RegionRepository $region
     * @return RegionResource
     */
    public function store(RegionRequest $request, RegionRepository $region): RegionResource
    {
        return new RegionResource($region->createItem($request->all()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RegionRequest $request
     * @param string $id
     * @param RegionRepository $region
     * @return RegionResource
     */
    public function update(RegionRequest $request, string $id, RegionRepository $region): RegionResource
    {
        return new RegionResource($region->updateItem($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @param RegionRepository $region
     * @return RegionResource
     */
    public function destroy(string $id, RegionRepository $region): RegionResource
    {
        return new RegionResource($region->destroyItem($id));
    }
}
