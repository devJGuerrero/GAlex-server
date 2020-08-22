<?php

namespace Modules\Country\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Country\Repository\Country;
use Modules\Country\Transformers\Resource;
use Illuminate\Contracts\Support\Renderable;
use Modules\Country\Http\Requests\ValidateStore;

class CountryController extends Controller
{
   /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Country $country)
    {
        return Resource::collection(
            $country->getALL()
        );
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Country $country, $id)
    {
        return new Resource(
            $country->getID($id)
        );
    }

    /**
     * Store a newly created resource in storage.
     * @param ValidateStore $request
     * @return Renderable
     */
    public function store(ValidateStore $request, Country $country)
    {
        return new Resource(
            $country->store($request->all())
        );
    }

    /**
     * Update the specified resource in storage.
     * @param ValidateStore $request
     * @param int $id
     * @return Renderable
     */
    public function update(ValidateStore $request, $id, Country $country)
    {
        return new Resource(
            $country->update($id, $request->all())
        );
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
