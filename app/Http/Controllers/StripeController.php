<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Session;
class StripeController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    public function stripePost(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create ([
            "amount" => 100*100,
            "currency" => "INR",
            "source" => $request->stripeToken,
            "description" => "This payment is testing purpose of websolutionstuff.com",
        ]);

        Session::flash('success', 'Payment Successful !');

        return back();
    }
}
