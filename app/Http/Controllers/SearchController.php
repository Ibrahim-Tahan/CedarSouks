<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;


class SearchController extends Controller
{
    public function search(Request $request,$storeId)
    {
        $searchTerm = $request->input('searchInput');
        $categories = Categories::where('store_Id', $storeId)->get();
        $products = collect();
        foreach ($categories as $category) {
            $productsInCategory = Products::where('categoryId', $category->id)
                                          ->where('name', 'like', "%$searchTerm%")
                                          ->get();
            $products = $products->merge($productsInCategory);
        }
return view('searchResult', compact('products'));
    }
}
