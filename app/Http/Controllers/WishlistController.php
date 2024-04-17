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
   public function index(){
    return view('Wishlist');
   }
  public function AddToWishlist(Request $request)
  {
      $user = Orders::where('status', 'inCart')->first();
      $buyersId = $user->id;
      $productId = $request->input('productId');
      $product = Products::find($productId);
      
      if (!$product) {
          return redirect()->back()->with('error', 'Product not found.');
      }
      
      $wishlist = new wishlist();
      $wishlist->productId = $productId;
      $wishlist->buyersId = $buyersId;
      $wishlist->save();
  
      $wishlists = wishlist::where('buyersId', $buyersId)->with('getProduct')->get();
  
      $data = [
          'wishlists' => $wishlists,
          'user' => $user,
      ];
  
      return view('Wishlist', $data);
  }
  public function destroy($id){
   $wishlist = wishlist::findOrFail($id);
   $wishlist->delete();
return view('Wishlist');
}

  
}
