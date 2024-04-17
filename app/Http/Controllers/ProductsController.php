<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Orders;
use App\Models\persons;
use App\Models\Order_details;
use App\Models\wishlist;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function cartView(){
        return view('Cart');
    }
    public function index()
    {
       // $products=Products::all();
       $products1=Products::where('categoryId', 1)->get();
       $products2=Products::where('categoryId', 2)->get();
       $products3=Products::where('categoryId', 3)->get();
       $products4=Products::where('categoryId', 4)->get();
       $products5=Products::where('categoryId', 5)->get();

       
       return view('index', compact('products1', 'products2', 'products3', 'products4','products5'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = new Products();
        $products->name = $request->name;
        $products->price = $request->price;
        $products->description = $request->description;
        $products->categoryId = $request->category;
        $products->save();
        return "Product created successfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
