<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
   public function index(){
    return view('CheckoutPage');
}
public function session(Request $request)
{
    \Stripe\Stripe::setApiKey(config('stripe.sk'));

    $productName = $request->get('productname');
    $totalPrice = $request->get('total');
    $priceInCents = intval($totalPrice) * 100;

    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [
            [
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => $priceInCents,
                    'product_data' => [
                        'name' => $productName,
                    ],
                ],
                'quantity' => 1,
            ],
        ],
        'mode' => 'payment',
        'success_url' => route('success'),
        'cancel_url'  => route('checkout'),

    ]);

    return redirect()->away($session->url);}


public function success()
{
    return "Thanks for you order You have just completed your payment. The seeler will reach out to you as soon as possible";
}
}