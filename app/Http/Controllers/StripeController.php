<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Models\Type;

class StripeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function showCharge() {
        $types = Type::all();
        return view('home.payment',compact('types'));
    }
    

    public function charge(Request $request)
    {
        $amount= \Cart::getTotal();
        // dd($amount);

        // Stripe決済用コード
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $amount,
                'currency' => 'jpy'
            ));

            return redirect('/home/payment/complete');

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function complete() {
        $types = Type::all();
        return view('home.complete',compact('types'));
    }

}
