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

    public function store(Request $request, $id)
    {
        $store = stores::find($id); // Use the "find" method to retrieve the store by its ID
        
        if ($store) {
            $store->latitude = $request->input('latitude'); 
            $store->longitude = $request->input('longitude');
            $store->save();
    
            return redirect()->route('tableindex', [
                'id' => $store->sellerId,
            ])->with('success', 'You have to wait for the admin to approve your store ' . $store->name);
        }
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
