<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Orders;
use App\Models\persons;
use App\Models\Order_details;
use App\Models\wishlist;

class CartController extends Controller
{
    public function index()
    {
    return view('addProduct');
    }
    public function cartView(){
        return view('Cart');
    }
    // public function AddToCart(Request $request)
    // {
    
    //     $order = Orders::where('status','inCart')->first();
    //     $orderId = $order->id;
    //     $quantity = $request->input('quantity');
    //     $productId = $request->input('productId');
    //     $product = Products::find($productId);
    //     $productCategoryName=$product->getCategory->name;
    //     $totalPrice = $product->price * $quantity;
    //     $productPrice=$product->price;
    //     $productName=$product->name;

    //     $orderDetail = new Order_details();
    //     $orderDetail->orderId = $orderId;
    //     $orderDetail->productId = $productId;
    //     $orderDetail->quantity = $quantity;
    //     $orderDetail->totalPrice = $totalPrice;
    //     $orderDetail->save();
    //     $orderDetails = Order_details::all(); 
    //     return view('Cart', compact('productCategoryName','productName','orderId','productPrice','orderDetails','productId','quantity','totalPrice'));
        
    // }
    public function AddToCart(Request $request)
{
    $order = Orders::where('status','inCart')->first();
    $orderId = $order->id;
    $quantity = $request->input('quantity');
    $productId = $request->input('productId');
    $product = Products::find($productId);
        $productName = $product->name;
        $productPrice = $product->price;
        $productCategoryName = $product->getCategory->name ;
        $totalPrice = $productPrice * $quantity;
        $orderDetail = new Order_details();
        $orderDetail->orderId = $orderId;
        $orderDetail->productId = $productId;
        $orderDetail->quantity = $quantity;
        $orderDetail->totalPrice = $totalPrice;
        $orderDetail->save();
        $orderDetails = Order_details::all(); 
        return view('Cart', compact('productCategoryName', 'productName', 'orderId', 'productPrice', 'orderDetails', 'productId', 'quantity', 'totalPrice'));
}
public function showCart(string $id)
{
    
   
}
}
