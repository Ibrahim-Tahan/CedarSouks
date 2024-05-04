<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\persons;
use App\Models\Products;
use App\Models\Order_details;

use Session;
class CheckoutController extends Controller
{
  public function index($id)
  {
      $products = Order_details::where('orderId', $id)->with('getProducts')->get();
      
      $totalPrice = $products->sum(function ($product) {
        return $product->getProducts->price * $product->quantity;
    });    
      return view('CheckoutPage', compact('products', 'totalPrice'));
  }
  public function ChangeStatus(Request $request)
  {
    $personId = null;
    if (Session::has('loginId')) {
        $personId = Session::get('loginId');
    } else {
        return "User not logged in.";
    }
    $user=persons::find($personId);
    $order = $user->getOrder()->latest()->first();    
     $order->status='Checked';
    $order->save();
    $order=new Orders();
    $order->userId=$personId;
    $order->save();
    return redirect()->route('CheckoutPage', ['id' => $order->id]);
    
  }
}
