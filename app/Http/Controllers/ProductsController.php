<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Orders;
use App\Models\persons;
use App\Models\Order_details;
use App\Models\wishlist;
use App\Models\Categories;
use App\Models\Stores;
use Session;





class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function cartView(){
        return view('Cart');
    }
   
     
    public function index($id)
    {
        $personId = null;
        if (Session::has('loginId')) {
            $personId = Session::get('loginId');
        } else {
            return "User not logged in.";
        }
    
        $person = Persons::find($personId);
        if (!$person) {
            return "User details not found.";
        }
    
        $store = Stores::find($id);
        $categories = $store->getCategories;
        $productsByCategory = [];
    
        foreach ($categories as $category) {
            $productsByCategory[$category->id] = $category->getProducts()->get();
        }
    
        return view('index', compact('categories', 'productsByCategory', 'store'));
    }
}