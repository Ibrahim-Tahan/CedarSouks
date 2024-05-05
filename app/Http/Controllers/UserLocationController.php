<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\address;
use Session;
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
    public function store(Request $request,$id)
    {

        $address = new address;
        $address->addressname = $request->addressname;
        $address->latitude = $request->latitude;
        $address->longitude = $request->longitude;
        $address->userId = $id;
        $address->save();

        return redirect()->route('getRegister')->with('success', 'You have registered successfully. Verify Your Email');

        
    }


    public function store2(Request $request,$id)
    {

        $address = new address;
        $address->addressname = $request->addressname;
        $address->latitude = $request->latitude;
        $address->longitude = $request->longitude;
        $address->userId = $id;
        $address->save();


        Session::put('loginId', $id);
        return redirect('dashboard');

       

        
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
