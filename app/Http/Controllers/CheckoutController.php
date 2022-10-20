<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Type;
use App\Models\Item;

class CheckoutController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout()
    {
        $types = Type::all();

        // the current login user id
        // $userId = auth()->user()->id;

        // Getting cart's contents for a specific user

        $orderItems = \Cart::getContent();
        $totalQuantity = \Cart::getTotalQuantity();
        if($totalQuantity == 0){
            return redirect('home');
        }
        return view('home.checkout', compact('orderItems','types'));
    }

    // public function addToOrder(Request $request)
    // {
    //     $userId = auth()->user()->id;

    //     \Cart::add([
    //         'id' => $request->id,
    //         'name' => $request->name,
    //         'price' => $request->price,
    //         'quantity' => $request->quantity,
    //         'attributes' => array(
    //             'image' => $request->image,
    //         )
    //     ]);

    //     return redirect('/home/order');
    // }

}
