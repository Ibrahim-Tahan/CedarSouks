<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stores;
use App\Models\Categories;
use App\Models\Products;
use App\Models\persons;
use Illuminate\Support\Facades\Session;


class CustomAuth2 extends Controller
{
    
    public function add($data)
    {
        return view("store.addstore", compact('data'));
    }


    public function store(Request $request, $userId)
    {
        $storeName = $request->input('storename');
    
        // Check if the store already exists in the database
        $existingStore = Stores::where('name', $storeName)->first();
        if ($existingStore) {
            return redirect()->route('tableindex', [
                'id' => $userId,
            ])->with('success', 'Store Already in the System '); 
        }

        $storeCount = Stores::where('sellerId', $userId)->count();
        if ($storeCount > 5) {
            return redirect()->route('tableindex', [
                'id' => $userId,
            ])->with('success', 'You have reached the limit of maximum store ');    
        }
        

    
        $store = new Stores();
        $store->name = $storeName;
        $store->description = $request->input('detail');
        $store->address = $request->input('address');
        $store->sellerId = $userId;

        $filename = time() . "-" . $request->file("myfile")->getClientOriginalName();
        $request->file("myfile")->move('images', $filename);

        $store->logo=$request->file("myfile")->getClientOriginalName();
        $store->path='images/' . $filename;

        $store->save();


        return view('pinShopLocation', compact('store'));

    }



    public function index($id)
    {
        // Fetch all the stores for the given user
        $data = Stores::where('sellerId', $id)->get();
    
        return view('store.table')->with('data', $data);
    }



    public function destroy(string $id)
    {
        $obj = Stores::find($id);
        $obj->delete();
        return redirect()->route('tableindex', [
            'id' => $obj->sellerId,
        ]);
    }



    public function destroy2(string $id, string $storeId)
    {
        $obj = Products::find($id);
        if ($obj) {
            $obj->delete();
            return redirect()->route('store.show', $storeId)->with('success', 'Product deleted successfully.');
        }
    }



    public function addCategory($storeId)
    {
        $store = Stores::findOrFail($storeId);
        return view('store.category')->with('store', $store);
    }

    public function storeCategory(Request $request, $storeId)
    {
        $store = stores::findOrFail($storeId);

        $category = new categories();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->getStores()->associate($store);
        $category->save();

        return redirect()->route('store.show', $storeId);
    }


    public function addProduct($storeId)
    {
        $store = stores::findOrFail($storeId);
        $categories = categories::where('store_id', $storeId)->get();

        return view('store.addProduct', compact('store', 'categories'));
    }




    public function storeCategoryProduct(Request $request, $storeId)
    {
        $store = stores::findOrFail($storeId);

        $product = new products();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->detail;
        $product->categoryId = $request->category;

        $filename = time() . "-" . $request->file("myfile")->getClientOriginalName();
        $request->file("myfile")->move('images', $filename);

        $product->logo=$request->file("myfile")->getClientOriginalName();
        $product->path='images/' . $filename;

        
        if($request->price>0)
        {
            $product->save();
        }

        return redirect()->route('store.show', $storeId);
    }

    public function show($id)
    {
        
        $store = stores::findOrFail($id);
        $categories = categories::where('store_id', $id)->get();

        return view('store.store')->with('store', $store)->with('categories', $categories);
    }



    public function searchstore(Request $request)
    {
        $name = $request->input('name');
        $stores = stores::where('name', 'LIKE', $name . '%')->where('isApproved', 'approved')->get();
    
        $data = persons::where('id', Session::get('loginId'))->first();
        return view('auth.dashboard', compact('data', 'stores'));
    }








   

}
