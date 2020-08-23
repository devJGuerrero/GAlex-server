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
    Route::get("countries", "CountryController@index");

    # Show the specified resource.
    Route::get("countries/{id}", "CountryController@show");

    # Store a newly created resource in storage.
    Route::post("countries", "CountryController@store");

    # Update the specified resource in storage.
    Route::put("countries/{id}", "CountryController@update");

    # Remove the specified resource from storage.
    Route::delete("countries/{id}", "CountryController@destroy");
});
