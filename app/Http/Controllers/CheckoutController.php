<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
class CheckoutController extends Controller
{
  public function index(){
    return view('CheckoutPage');
  }
  public function ChangeStatus(Request $request)
  {
    $orderId=$request->input('orderId');
    $order=Orders::find($orderId);
    $order->status='Checked out';
    $order->save();
    
  }
}
