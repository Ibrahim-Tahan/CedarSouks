<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
class DataController extends Controller
{
    public function index()
    {
           // $products=Products::all();
           $products1=Products::where('categoryId', 1)->get();
           $products2=Products::where('categoryId', 2)->get();
           $products3=Products::where('categoryId', 3)->get();
           $products4=Products::where('categoryId', 4)->get();
           return view('index', compact('products1', 'products2', 'products3', 'products4'));
        
  
    }
    public function getProductsByCategory($category) {
        $products = Products::where('category', $category)->get();
        return view('products', ['products' => $products]);
    }

    public function create()
    {
    return view('addProduct');
    }

    

    public function store(Request $request)
    {
        $products = new Products();
        $products->name = $request->name;
        $products->price = $request->price;
        $products->description = $request->description;
        $products->categoryId = $request->category;
        $products->storeId = $request->store_name;
        $products->save();
        return "Product created successfully";
    }
    public function getCategoryName($categoryId) {
        $categoryNames = [
            1 => "Offers",
            2 => "Chips",
            3 => "Healthy Section",
            4 => "Candies and Cakes",
        ];

        if (isset($categoryNames[$categoryId])) 
            return $categoryNames[$categoryId];
         else {
            return "Other";
        }
    }
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