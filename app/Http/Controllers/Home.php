<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
  public function HomePage(){
    return view('storeIndex');
  }
  public function Cart(){
    return view('Cart');
  }
  public function WishList(){
    return view('WishList');
  }
  public function Checkout(){
    return view('Checkout');
  }
}
