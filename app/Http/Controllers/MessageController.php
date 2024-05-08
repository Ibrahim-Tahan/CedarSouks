<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\persons;
use App\Models\messages;
use App\Events\SendNotification;
use Session;
class MessageController extends Controller
{
    public function view($id) {
        if (Session::has('loginId')) {
            $loginId = Session::get('loginId');
            $user = persons::find($loginId);
            $user_type = $user->user_type;
            if ($user_type == 'Seller') {
                $users = persons::where('user_type', 'Buyer')->get();
                $unreadCounts = messages::selectRaw('COUNT(*) as unread_count, sender_id')
                    ->where('receiver_id', $id)
                    ->groupBy('sender_id')
                    ->get();
                $userName = $user->name;
    $id=$id;                
    $messages = messages::where('receiver_id', $id)->orderBy('created_at', 'asc')->get();
    
    return view("MessagesSeller",["id"=>$id,"users"=>$users,"unreadcount"=>$unreadCounts]);
            
            } else {
                return dd(Session::all());
            }
        } else {
            return 'external error';
        }
    }
    
    
    public function indexBuyer($id){
        if (Session::has('loginId')) {
            $loginId = Session::get('loginId');
            $user = persons::find($loginId);
            $user_type = $user->user_type;
            if ($user_type == 'Buyer' && $loginId == $id) {
                $users = persons::where('user_type', 'Seller')->get();
                $unreadCounts = messages::selectRaw('COUNT(*) as unread_count, id')
                ->where('receiver_id', $id)
                ->groupBy('id')
                ->get();
            
                return view("MessagesBuyer",["id"=>$id,"users"=>$users,"unreadcount"=>$unreadCounts]);
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }
    
    public function chat($sellerid,$buyerid){
        if (Session::has('loginId')) {
            $loginId=Session::get('loginId');
            $person=persons::find($loginId);
            $user_type=$person->user_type;
            if (Session::has('loginId')==$sellerid && $user_type== 'Seller'){
                $messages = messages::where(function($query) use ($sellerid, $buyerid) {
                    $query->where('sender_id', $sellerid)
                          ->where('receiver_id', $buyerid);
                })
                ->orWhere(function($query) use ($sellerid, $buyerid) {
                    $query->where('sender_id', $buyerid)
                          ->where('receiver_id', $sellerid);
                })
                ->orderBy('created_at', 'asc') 
                ->get();
                foreach ($messages as $message) {
                    if ($message->receiverid == $sellerid) {
                        $message->save();
                    }
                }
                $buyer=persons::find($buyerid);
                return view('ChatSeller',["messages"=>$messages,"id"=>$sellerid,"buyer"=>$buyer]);
            }else{
                return dd(Session::all());
            }
        }else{
            return redirect('/');
        }
    }
    public function chatBuyer($buyerid,$sellerid){
        if (Session::has('loginId')) {
            $id=Session::get('loginId');
$person=persons::find($id);
$user_type=$person->user_type;
            if (Session::get('loginId') == $buyerid &&  $user_type== 'Buyer'){
                $messages = messages::where(function($query) use ($sellerid, $buyerid) {
                    $query->where('sender_id', $sellerid)
                          ->where('receiver_id', $buyerid);
                })
                ->orWhere(function($query) use ($sellerid, $buyerid) {
                    $query->where('sender_id', $buyerid)
                          ->where('receiver_id', $sellerid);
                })
                ->orderBy('created_at', 'asc') 
                ->get();
                foreach ($messages as $message) {
                    if ($message->receiverid == $buyerid) {
                        $message->is_read = true;
                        $message->save();
                    }
                }
                $seller=persons::find($sellerid);
                return view('ChatBuyer',["messages"=>$messages,"id"=>$buyerid,"seller"=>$seller]);
            }else{
               return dd(Session::all());
            }
        }else{
            return 'Error2';
        }
    }
    public function selleraddmsg(Request $request){
        $msg = new messages();
        $msg->sender_id = $request->sellerid;
        $msg->receiver_id = $request->buyerid;
        $msg->message = $request->sellermessage;
        $msg->save();
        
        event(new SendNotification($msg, 'my-channel' . $msg->receiver_id, 'my-event'.$msg->receiver_id,'msg'));
        
        $messages = messages::where(function($query) use ($msg) {
            $query->where('sender_id', $msg->sender_id)
                  ->where('receiver_id', $msg->receiver_id);
        })
        ->orWhere(function($query) use ($msg) {
            $query->where('sender_id', $msg->receiver_id)
                  ->where('receiver_id', $msg->sender_id);
        })
        ->orderBy('created_at', 'asc') 
        ->get();
        
        foreach ($messages as $message) {
            if ($message->receiver_id == $msg->sender_id) {
                $message->save();
            }
        }
        
        return redirect()->route('chatSeller', ["sellerid" => $msg->sender_id, "buyerid" => $msg->receiver_id]);
    }
    
    public function buyeraddmsg(Request $request){
        $msg = new messages();
        $msg->sender_id = $request->input('buyerid');
        $msg->receiver_id = $request->input('sellerid');
        $msg->message = $request->sellermessage;
        $msg->save();
        event(new SendNotification($msg, 'my-channel' . $msg->receiver_id, 'my-event'.$msg->receiver_id,'msg'));
        $messages = messages::where(function($query) use ($msg) {
            $query->where('sender_id', $msg->sender_id)
                  ->where('receiver_id', $msg->receiver_id);
        })
        ->orWhere(function($query) use ($msg) {
            $query->where('sender_id', $msg->receiver_id)
                  ->where('receiver_id', $msg->sender_id);
        })
        ->orderBy('created_at', 'asc') 
        ->get();
        foreach ($messages as $message) {
            if ($message->receiver_id == $msg->sender_id) {
                $message->save();
            }
        }
        return redirect()->route('chatBuyer',["buyerid"=>$msg->sender_id,"sellerid"=>$msg->receiver_id]);    
    }
    

}
