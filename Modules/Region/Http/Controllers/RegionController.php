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
     * Instance of repository.
     *
     * @var RegionRepository
     */
    protected $region;

    /**
     * RegionController constructor.
     *
     * @param RegionRepository $region
     */
    public function __construct(RegionRepository $region) { $this->region = $region; }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return RegionResource::collection($this->region->all());
    }

    /**
     * Show the specified resource.
     *
     * @param string $id
     * @return RegionResource
     */
    public function show(string $id): RegionResource
    {
        return new RegionResource($this->region->findOrFail($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RegionRequest $request
     * @return RegionResource
     */
    public function store(RegionRequest $request): RegionResource
    {
        return new RegionResource($this->region->create($request->all()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RegionRequest $request
     * @param string $id
     * @return RegionResource
     */
    public function update(RegionRequest $request, string $id): RegionResource
    {
        return new RegionResource($this->region->update($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return RegionResource
     */
    public function destroy(string $id): RegionResource
    {
        return new RegionResource($this->region->delete($id));
    }
}
