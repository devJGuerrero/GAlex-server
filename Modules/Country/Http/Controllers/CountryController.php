<?php

namespace Modules\Country\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Country\Repository\Country;
use Modules\Country\Transformers\Resource;
use Illuminate\Contracts\Support\Renderable;
use Modules\Country\Http\Requests\ValidateStore;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Country $country
     * @return AnonymousResourceCollection
     */
    public function index(Country $country)
    {
        return Resource::collection(
            $country->getItems()
        );
    }

    /**
     * Show the specified resource.
     *
     * @param Country $country
     * @param int $id
     * @return Resource
     */
    public function show(Country $country, $id)
    {
        return new Resource(
            $country->getItem($id)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ValidateStore $request
     * @param Country $country
     * @return Resource
     */
    public function store(ValidateStore $request, Country $country)
    {
        return new Resource(
            $country->createItem($request->all())
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ValidateStore $request
     * @param int $id
     * @param Country $country
     * @return Resource
     */
    public function update(ValidateStore $request, $id, Country $country)
    {
        return new Resource(
            $country->updateItem($id, $request->all())
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param Country $country
     * @return Resource
     */
    public function destroy($id, Country $country)
    {
        return new Resource(
            $country->destroyItem($id)
        );
    }
}
