<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stores;

class StoreLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pinShopLocation');
    }

    public function store(Request $request)
    {
        $store= new Stores;
        $store->name = $request->input('name');
        $store->sellerId = $request->sellerId;
        $store->address = $request->input('address');
        $store->description = $request->input('description');
        $store->latitude = $request->input('latitude'); 
        $store->longitude = $request->input('longitude');

        $store->save();

        return $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
