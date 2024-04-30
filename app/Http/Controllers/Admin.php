<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\persons;
use App\Models\stores;
use App\Models\categories;
use App\Models\products;
use Hash;
use App\Mail\RegisterMail3;
use Mail;
use Str;

class Admin extends Controller
{
    public function store()
    {
        $data=stores::all();
        return view('admin.allstore', compact('data'));
    }



    public function approve($id)
    {
        $store = stores::findOrFail($id);

        if($store)
        {
            if($store->isApproved == "pending")
            {
                $store->isApproved="approved";
                $store->save();
                return redirect()->route('allstore')->with('success', 'The Store '. $store->name . " Was Approved");
            }
            else
            {
                $store->isApproved="pending";
                $store->save();
                return redirect()->route('allstore')->with('success', 'The Store '. $store->name . " Is Not Approved Anymore");
            }
        }
        else
        {
            return redirect('allstore');
        }
    }



    public function search2(Request $request)
    {

        $name=$request->input('name');
        
        $data = stores::where('name', 'LIKE', $name . '%')->get();

        return view('admin.allstore', compact('data'));
    }




    public function User()
    {
        $data=persons::all();
        return view('admin.alluser', compact('data'));
    }




    public function filter(Request $request)
    {
        if($request->input('type')=="ALL")
        {
            return redirect()->route('alluser');
        }
        else
        {
            $data=persons::where('user_type',$request->input('type'))->get();
            return view('admin.alluser', compact('data'));
        }
    }












    public function reset($id)
    {
        $user = persons::findOrFail($id);
        if (!$user) {
            $data=persons::all();
            return view('admin.alluser', compact('data'));
        } else {
            Mail::to($user->email)->cc('cc@example.com')->send(new RegisterMail3($user));
            $data=persons::all();
            return redirect()->route('alluser')->with('success', 'An email was sent to '. $user->fullname);
        }

    }


    public function update($id)
    {
        return view('admin.resetpass', compact('id'));
    }



    public function changepass(Request $request,$id)
    {
        $data = persons::findOrFail($id);
        $user = persons::findOrFail($id);

        if($data)
        {
           $data->password = Hash::make($request->password);
           $res = $data->save();

           return redirect('login');
        }
        else
        {
            return redirect('login');
        }

    }


    public function adminpage()
    {
        return view('auth.admin');
    }


}
