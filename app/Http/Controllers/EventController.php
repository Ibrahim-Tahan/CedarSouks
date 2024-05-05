<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stores;
use App\Models\events;
use App\Models\Products;
use App\Models\event_user_product;
use Carbon\Carbon;
use App\Models\persons;
use Illuminate\Support\Facades\Session;
use Spatie\GoogleCalendar\Event;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function indexEvents($id){
        $stores = Stores::where('SellerId', $id)->get();
        
        $UserId = Session::get('loginId');
        $person = Persons::find($UserId);

        return view("viewAllEvents",compact('stores','person'));
    }
    
    
    
    public function index($id)
    {
        $stores = Stores::where('SellerId', $id)->get();
        return view("makeEventindex",compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $startTime = Carbon::parse($request->input('date').' ' . $request->input('time'), 'Asia/Beirut');
        $endTime = (clone $startTime)->addHours(5);


        $event = new events;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->storeId = $request->storeId;
        $storeId = $event->storeId;
        $event->save();

/*

        Event::create([
            'name'=> $request->input('title'),
            'description'=> $request->input('description'),
            'startDateTime'=> $startTime,
            'endDateTime'=> $endTime
        ]);

*/

        $prods = Products::whereHas('getCategory', function ($query) use ($storeId){
            $query->where('Store_id',$storeId);
        })->get();
        return view('addProductEvent',compact('event','prods'));
    }



    //Make a form with 2 submit button, 1 for add more procucts, another for done.
    public function storeProducts(Request $request)
    {
        $prod = new event_user_product;
        $prod->eventId = $request->eventId;
        $prod->productId = $request->productId;
        $prod->bidding_price = $request->bidding_price; 
        
        
        $prod->save();   
        $event = Events::find($request->eventId);
        
        $storeId = $event->storeId;
        $prods = Products::whereHas('getCategory', function ($query) use ($storeId) {
            $query->where('Store_id', $storeId);
        })->get();

        return view('addProductEvent', compact('event','prods'))->with('success','Product Added Successfully');
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
