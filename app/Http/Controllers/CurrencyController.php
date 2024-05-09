<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Models\Currencies;

class CurrencyController extends Controller
{
    //
    public function convert(Request $request){
        $curr = $request->input('to_curr');
        $total_price=$request->input('total_price');
        $conv = Currency::convert()->from('USD')->to($curr)->amount($total_price)->get();
        return view('addToCart')->with('flash_msg_success','The amount in your currency is {{$conv}}');
    }
    public function converter(){
        return view('converter');
    }

}
