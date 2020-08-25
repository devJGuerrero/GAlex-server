<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(["middleware" => "api"], function () {
    # Display a listing of the resource.
    Route::get("regions", "RegionController@index");

    # Show the specified resource.
    Route::get("regions/{id}", "RegionController@show");

    # Store a newly created resource in storage.
    Route::post("regions", "RegionController@store");

    # Update the specified resource in storage.
    Route::put("regions/{id}", "RegionController@update");

    # Remove the specified resource from storage.
    Route::delete("regions/{id}", "RegionController@destroy");
});
