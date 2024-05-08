<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\persons;
use App\Models\Favorites;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CustomAuthController;

class FavoriteController extends Controller
{
    //
    public function favorite(Request $request) {
        Favorites::create([
            'user_id' => $request->persons::where('id',Session::get('loginId')),
            'store_id' => $request->store_id
        ]);

        $favorite = new Favorites();
        $favorite->userID=$request->user_id;
        $favorite->store_id=$request->store_id;
        $favorite->save();
        return back();
    }
}
