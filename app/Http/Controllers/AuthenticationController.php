<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\persons;
use Illuminate\Support\Facades\Auth;


class AuthenticationController extends Controller
{
    public function index(){
        return view('LoginView');
    }
    public function authenticateUser(Request $request)
{
    $email = $request->input('email');
    $password = $request->input('password');
    $user = persons::where('email', $email)->first();

    if (!$user) {
        return "User does not exist";
    }

    if ($password===$user->password) {
        Auth::login($user);
        return redirect()->route('products.index');
    } else {
        return "Invalid credentials";
    }
}
}
