<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wishlist;
use App\Models\Products;
use App\Models\Orders;
use App\Models\persons;
use App\Models\Order_details;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = wishlist::all(); 
        return view('Wishlist', compact('wishlists'));
    }
  public function AddToWishlist(Request $request)
  {
      $user = Orders::where('status', 'inCart')->first();
      $buyersId = $user->id;
      $productId = $request->input('productId');
      $product = Products::find($productId); 
      $productId = $request->input('productId');
      $existingWishlistItem = wishlist::where('productId', $productId)
                                      ->first();
        if ($existingWishlistItem) {
          return "Item already exists in the wishlist.";
      }
      $wishlist = new wishlist();
      $wishlist->productId = $productId;
      $wishlist->buyersId = $buyersId;
      $wishlist->save();
      $wishlists = wishlist::where('buyersId', $buyersId)->with('getProduct')->get();
      return view('Wishlist',compact('wishlists'));
  }

  
  public function destroy($id){
    $wishlist=wishlist::find($id);
    $wishlist->delete();
    return redirect()->route('addToWishlist');
    }

  
}
