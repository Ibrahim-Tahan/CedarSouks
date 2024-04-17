<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->input('searchInput');
        $products = Products::where('name', 'like', "%$searchTerm%")->get();
        return view('searchResult', compact('products'));
    }
}
