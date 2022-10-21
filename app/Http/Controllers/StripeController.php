<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;

class StripeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function charge(Request $request)
    {
        $amount= \Cart::getTotal();
        // dd($amount);

        Stripe::setApiKey(env('STRIPE_SECRET'));//シークレットキー
 
        $charge = Charge::create(array(
             'amount' => 100,
             'currency' => 'jpy',
             'source'=> request()->stripeToken,
         ));
    //    return back();
    }
}
