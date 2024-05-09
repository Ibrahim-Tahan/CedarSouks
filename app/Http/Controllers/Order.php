<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\persons;
use App\Models\orders;
use App\Models\stores;
use App\Models\Categories;
use App\Models\Products;
use App\Models\order_details;

class Order extends Controller
{
    public function order2($id)
    {
        $person = persons::where('id', Session::get('loginId'))->first();
    
         $orderDetails = order_details::query()
        ->join('orders', 'order_details.orderId', '=', 'orders.id')
        ->join('products', 'order_details.productId', '=', 'products.id')
        ->join('categories', 'products.categoryId', '=', 'categories.id')
        ->join('stores', 'categories.store_id', '=', 'stores.id') // Updated join condition
        ->where('stores.id', '=', $id) // Use $id as the value directly
        ->where('orders.status', '=', 'Checked')
        ->select('order_details.orderId', 'order_details.productId', 'order_details.quantity','order_details.id')
        ->get();
        return view("order.orders", compact('orderDetails','id'));
    }

    public function order()
    {

       
        $data2= persons::where('id', Session::get('loginId'))->first();
        
        $data=stores::where('sellerId',$data2->id)->get();

        return view("order.all", compact('data'));

    }


    public function homepage()
    {
        if (Session::has('loginId')) {
            $data = persons::where('id', Session::get('loginId'))->first();
        }
        return view('auth.homepage', compact('data'));
    }

















    public function detail2($id)
    {
        $data = null;
        if (Session::has('loginId')) {
            $data = persons::where('id', Session::get('loginId'))->first();
        }
    
        $od = order_details::where('id', $id)->first();
        $order = orders::where('id', $od->orderId)->first();
        $user = persons::where('id', $order->userId)->first();
        $products = products::where('id', $od->productId)->first();
        $categories = categories::where('id', $products->categoryId)->first();
        $store = stores::where('id', $categories->store_id)->first();
    
        return view('order.receipt', compact('data', 'od', 'order', 'user', 'products', 'store'));
    }




    public function date(Request $request,$id)
    {
        $date1 = $request->input('start-date');
        $date2 = $request->input('end-date');
    
        $person = persons::where('id', Session::get('loginId'))->first();
    
        $orderDetails = order_details::query()
            ->join('orders', 'order_details.orderId', '=', 'orders.id')
            ->join('products', 'order_details.productId', '=', 'products.id')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->join('stores', 'categories.store_id', '=', 'stores.id') // Updated join condition
            ->where('stores.id', '=', $id) // Use $id as the value directly
            ->where('orders.status', '=', 'Checked')
            ->where('order_details.created_at', '>=', $date1) // Specify the 'orders' table alias
            ->where('order_details.created_at', '<=', $date2) // Specify the 'orders' table alias
            ->select('order_details.orderId', 'order_details.productId', 'order_details.quantity', 'order_details.id')
            ->get();
    
            return view("order.orders", compact('orderDetails','id'));
    }



    public function top($id)
    {
        $max = 0;
        $maxProductName = null;
    
        $products = products::query()
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->join('stores', 'categories.store_id', '=', 'stores.id')
            ->where('stores.id', '=', $id)
            ->select('products.id', 'products.name')
            ->get();
    
        foreach ($products as $product) {
            $orderDetails = order_details::query()
                ->join('orders', 'order_details.orderId', '=', 'orders.id')
                ->join('products', 'order_details.productId', '=', 'products.id')
                ->where('products.id', '=', $product->id)
                ->where('orders.status', '=', 'Checked')
                ->select('order_details.orderId', 'order_details.productId', 'order_details.quantity', 'order_details.id')
                ->get();
    
            $totalQuantity = 0;
    
            foreach ($orderDetails as $orderDetail) {
                $totalQuantity += $orderDetail->quantity;
            }
    
            if ($totalQuantity > $max) {
                $max = $totalQuantity;
                $maxProductName = $product->name;
            }
        }
    
        return view("order.top", compact('max', 'maxProductName'));
    }





}





