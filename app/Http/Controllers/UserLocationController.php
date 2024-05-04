<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\address;
class UserLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('PinUserLocation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $address = new address;
        $address->addressname = $request->addressname;
        $address->latitude = $request->latitude;
        $address->longitude = $request->longitude;
        $address->userId = $request->uid;
        $address->save();

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
