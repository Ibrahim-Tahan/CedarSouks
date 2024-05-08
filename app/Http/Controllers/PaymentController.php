<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{



    public function CryptoView(){
        return view('CryptoOption');
    }
    public function __construct()
    {
        if(!request()->coin)
            request()->coin = 'BTC'; //you can set a default coin
    }

    /**
     * Collect Order data and Redirect user to Payment gateway
     */
    public function redirectToGateway(Request $request)
    {
        try{
            //You should collect the details you need from a form
                        
            // there are several ways to do this , 
            // but you can add your success url here
            // User will be redirected here after a successful payment.
            request()->success_url = route('callback');

            $invoiceDetails = Coinremitter::createInvoice();

            // or alternatively use the helper
            $invoiceDetails = coinremitter()->createInvoice();


            dd($invoiceDetails);
            // Now you have the payment details,
            // you can store the invoice_id in your db
            // Implement your own UI to show them the QRCode and wallet address,
            // Do whatever you want or you can then redirect them to gateway with

            // return redirect()->to($invoiceDetails['data']['url']);
        }catch(\Exception $e) {
            return redirect()->back()->with('failed',"There's an error in the data");
        }        
    }
}
