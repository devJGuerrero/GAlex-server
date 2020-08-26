<?php

namespace Modules\Country\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Country\Http\Requests\CountryRequest;
use Modules\Country\Transformers\CountryResource;
use Modules\Country\Repositories\CountryRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CountryRepository $country
     * @return AnonymousResourceCollection
     */
    public function index(CountryRepository $country): AnonymousResourceCollection
    {
        return CountryResource::collection($country->getItems());
    }

    /**
     * Show the specified resource.
     *
     * @param string $id
     * @param CountryRepository $country
     * @return CountryResource
     */
    public function show(string $id, CountryRepository $country): CountryResource
    {
        return new CountryResource($country->getItem($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CountryRequest $request
     * @param CountryRepository $country
     * @return CountryResource
     */
    public function store(CountryRequest $request, CountryRepository $country): CountryResource
    {
        return new CountryResource($country->createItem($request->all()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CountryRequest $request
     * @param string $id
     * @param CountryRepository $country
     * @return CountryResource
     */
    public function update(CountryRequest $request, string $id, CountryRepository $country): CountryResource
    {
        return new CountryResource($country->updateItem($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @param CountryRepository $country
     * @return CountryResource
     */
    public function destroy(string $id, CountryRepository $country): CountryResource
    {
        return new CountryResource($country->destroyItem($id));
    }
}
