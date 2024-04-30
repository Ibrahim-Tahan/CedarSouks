<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Orders;
use App\Models\persons;
use App\Models\Order_details;
use App\Models\wishlist;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index()
    {
    return view('addProduct');
    }
    public function cartView()
{     
        $orderDetails = Order_details::whereHas('getOrders', function($query) {
            $query->where('status', 'inCart');
        })->get();
    
        return view('Cart', compact('orderDetails'));
    }
    public function AddToCart(Request $request)
    {
        $userId = Auth::id();
        $person = persons::find($userId);
        $orders = $person->getOrders()->where('status', 'inCart')->first();       
        if (!$orders) {
            return "No active cart found for the user.";
        }
        $order = $orders->first();
        $orderId = $order->id;
        $quantity = $request->input('quantity');
        $productId = $request->input('productId');
        $product = Products::find($productId);
        $productPrice = $product->price;
        $totalPrice = $productPrice * $quantity;
        $productName = $product->name;
    
   
        $existingOrderDetail = Order_details::where('orderId', $orderId)
            ->where('productId', $productId)
            ->first();
    
        if ($existingOrderDetail) {
            return "Item already added to cart";
        }
        $orderDetail = new Order_details();
        $orderDetail->orderId = $orderId;
        $orderDetail->productId = $productId;
        $orderDetail->quantity = $quantity;
        $orderDetail->totalPrice = $totalPrice;
        $orderDetail->save();
            $orderDetails = Order_details::where('orderId', $orderId)->first();
        return view('Cart', compact('totalPrice', 'product', 'productName', 'orderId', 'productPrice', 'orderDetails', 'productId', 'quantity', 'totalPrice'));
    }
    
    
public function delete($id){
$product=Order_details::find($id);
$product->delete();
return redirect()->route('cartView');
}
}
