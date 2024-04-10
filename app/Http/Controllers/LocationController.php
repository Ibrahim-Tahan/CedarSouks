<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\address;

class LocationController extends Controller
{
    public function index(){
        return view('PinLocation');
    }

    public function insertUserAddress(Request $request){

        $address = new address;
        $address->addressname = $request->addressname;
        $address->latitude = $request->latitude;
        $address->longitude = $request->longitude;
        $address->userId = $request->uid;
        $address->save();
        return view('PinLocation');
    }


}
