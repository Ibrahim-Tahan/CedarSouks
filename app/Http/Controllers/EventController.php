<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stores;
use App\Models\events;
use App\Models\Products;
use App\Models\event_user_product;
use Carbon\Carbon;
use App\Models\persons;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Spatie\GoogleCalendar\Event;


class EventController extends Controller
{
    
    public function indexEvents($id){
        $stores = Stores::where('SellerId', $id)->get();
        
        $UserId = Session::get('loginId');
        $person = Persons::find($UserId);

        return view("events.viewAllEvents",compact('stores','person'));
    }
    
    public function index($id)
    {
        $stores = Stores::where('SellerId', $id)->get();
        return view("events.makeEventindex",compact('stores'));
    }

    public function indexMoreProducts($id){
        $event = Events::find($id);
        $storeId = $event->storeId;
        $prods = Products::whereHas('getCategory', function ($query) use ($storeId){
            $query->where('Store_id',$storeId);
        })->get();
        return view('events.addMoreProducts', compact('event','prods'));
    }


     public function storeMoreProducts(Request $request)
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

        return view('events.addMoreProducts', compact('event','prods'));
    }


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

        Event::create([
            'name'=> $request->input('title'),
            'description'=> $request->input('description'),
            'startDateTime'=> $startTime,
            'endDateTime'=> $endTime
        ]);



        $prods = Products::whereHas('getCategory', function ($query) use ($storeId){
            $query->where('Store_id',$storeId);
        })->get();
        return view('events.addProductEvent',compact('event','prods'));
    }

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

        return view('events.addProductEvent', compact('event','prods'));
    }

    
    public function show(string $id)
    {
        $event = Events::find($id);
        $prods = Products::whereHas('getEventUserProduct', function ($query) use ($id) {
            $query->where('eventId', $id);
        })->get();
    
        return view('events.viewEventProducts', compact('event', 'prods'));
    }

    public function delete(string $id){
        $eventproduct = event_user_product::findOrFail($id);  
        $eventId = $eventproduct->eventId;
        
        $eventproduct->delete(); 
        return Redirect::route('event.showProducts', ['id' => $eventId]);
    }

    public function deleteEvent(string $id){
        $event = Events::find($id);
        $storeId = $event->storeId;
        $event->delete();
        
        return Redirect::route('viewAllEvents',['id'=>$storeId]);

    }
    
}
