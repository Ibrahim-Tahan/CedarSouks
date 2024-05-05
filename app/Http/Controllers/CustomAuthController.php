<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\persons;
use App\Models\orders;
use App\Models\stores;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Crypt;


use App\Mail\RegisterMail;





class CustomAuthController extends Controller
{

    //Return The login View
    public function login()
    {
        return view("auth.login");
    }



    // Registration view
    public function registration()
    {
        return view("auth.registration");
    }





    // User registration
    public function registerUser(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12',
            'date' => 'required|date|before:2016-12-31|date_format:Y-m-d',
            'type' => 'required'
        ]);

        $email=$request->email;
        $user=persons::where('email',$email)->first();
        if($user)
        {
            return redirect()->back()->with('fail', 'Email alredy Registred in the Database');
        }
        // Create a new User instance
        $user = new persons();
        $user->fullname = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->birth_date = $request->date;
        $user->user_type = $request->type;
        $user->email_verification_code=Str::random(40);
        $user->verified=0;
        $user->remember_token = Str::random(40);
        $res = $user->save(); // Save the user to the database

        


        
        Mail::to($request->email)->send(new RegisterMail ($user));

        // Display success or failure message
        if ($request->date > '2016-12-31') {
            return redirect()->back()->with('fail', 'Date must be valid');
        }
        if ($res) {
            if($user->user_type=="Buyer")
            {
                $order=new orders();
                $order->userId=$user->id;
                $order->save();
                return view('pinUserlocation', compact('user'));
            }
            else
            {
                return redirect()->back()->with('success', 'You have registered successfully,Verify Your Email');
            }
        } else {
            return redirect()->back()->with('fail', 'Something went wrong');
        }
    }



    // User login
    public function loginUser(Request $request)
    {
        // Validate input data
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = persons::where('email', $request->email)->first();

        if($request->input('email')=="Admin@hotmail.com")
        {
            if($request->input('password')=="admin123")
            {
                return view ('auth.admin');
            }
            else
            {
                return back()->with('fail', 'Password Is Wrong');
            }
        }
        else
        {

            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    if ($user->verified == 0) {
                        return back()->with('fail', 'This email is not validated Validate it');
                    } else {
                        Session::put('loginId', $user->id);
                        return redirect('dashboard');
                    }
                } else {
                    return back()->with('fail', 'Password does not match');
                }
            } else {
                return back()->with('fail', 'This email is not registered');
            }
        }

    }


     // User dashboard
     public function dashboard()
     {
         $stores = stores::all();

         $data = array();
         if (Session::has('loginId')) {
             $data = persons::where('id', Session::get('loginId'))->first();
         }
         if ($data->user_type == 'Buyer') {

             return view('auth.dashboard', compact('data','stores'));
         } else {
             return view('auth.homepage', compact('data'));
         }
     }













     
           
    public function github()
    {
       return Socialite::driver('github')->redirect();
    }

    public function githubRedirect()
    {
        $githubUser = Socialite::driver('github')->user();

        // Check if the user already exists in your application
        $user = persons::where('email', $githubUser->email)->first();

        if (!$user) {
            // Create a new user if the user doesn't exist
            $user = new persons();
            $user->email = $githubUser->email;
            $user->password = Hash::make(Str::random(16));
            $user->fullname = $githubUser->name ?? 'GitHub User';
            $user->user_type="Seller";
            $user->verified=1;
            $user->save();
            return view('auth.type', compact('user'));
        }

        // Manually log in the user
        Session::put('loginId', $user->id);
        return redirect('dashboard');

        
    }





    // Google login
    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect()
    {
        $googleUser = Socialite::driver('google')->user();

        // Check if the user already exists in your application
        $user = persons::where('email', $googleUser->email)->first();

        if (!$user) {
            // Create a new user if the user doesn't exist
            $user = new persons();
            $user->email = $googleUser->email;
            $user->password = Hash::make(Str::random(16));
            $user->fullname = $googleUser->name ?? 'Google User';
            $user->verified=1;
            $user->user_type="Seller";
            $user->save();
            return view('auth.type', compact('user'));
        }

        // Manually log in the user
        Session::put('loginId', $user->id);

        return redirect('dashboard');
    }







    public function changingUser(Request $request, $userId)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$userId,
            'date' => 'required|date|before:2020-12-31|date_format:Y-m-d',
        ]);
    
        $user = Persons::find($userId);
    
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        
    
        $user->fullname = $request->input('name');
        $user->email = $request->input('email');
        $user->birth_date = $request->input('date');
        $user->remember_token = Str::random(40);
    
        $password = $request->input('password');
    
        if ($password && strlen($password) >= 5) {
            $user->password = Hash::make($password);
        }
        $user->save();
    
        if (Session::has('loginId')) {
            Session::forget('loginId');
        }
    
        return redirect('login');
    }





























    public function type(Request $request, $userId)
    {
        $user = persons::find($userId);
        if ($user) {
            $user->user_type = $request->input('type');
            $user->save();
            if($user->user_type=="Buyer")
            {
                $order=new orders();
                $order->userId=$user->id;
                $order->save();
                return view('pinUserlocation2', compact('user'));
            }
            Session::put('loginId', $user->id);
            return redirect('dashboard');
        } else {
            return "There was an error";
        }
    }

    // User logout
    public function logout()
    {
        if (Session::has('loginId')) {
            Session::forget('loginId');
        }
        return redirect('login');
    }




    //Update User
    public function update2()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = persons::where('id', Session::get('loginId'))->first();
        }
        return view('auth.updating', compact('data'));
    }






    //Verify email function

    public function verify_email($verification_code)
    {

        $user=persons::where('email_verification_code',$verification_code)->first();

        if( !$user)
        {
            return redirect()->route('getRegister')->with('eror');

        }
        else
        {
            if($user->verified)
            {
                return redirect()->route('getRegister')->with('email alredy verified');
            }
            else
            {
                $user->verified=1;
                $user->save();
                return redirect()->route('getRegister')->with('Email Was Verified');
            }
             
        }

    }




  











}


