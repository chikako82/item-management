<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Type;
use App\Models\Item;
use App\Models\User;

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
        $userId = auth()->user()->id;

        // Getting cart's contents for a specific user

        $orderItems = \Cart::getContent();
        $totalQuantity = \Cart::getTotalQuantity();
        if($totalQuantity == 0){
            return redirect('home');
        }
        return view('home.checkout', compact('orderItems','types'));
    }

    public function deliveryDetails()
    {
        $types = Type::all();

        // the current login user id
        $userId = auth()->user()->id;
        // dd($userId);
        
        $userEmail = auth()->user()->email;
        // dd($userEmail);

        return view('home.user-info', compact('types','userEmail'));
    }

    public function create(Request $request)
    {
        $types = Type::all();

        $this->validate($request, [
            'fullname' => 'required',
            'postcode' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $userId = auth()->user()->id;
        $user = User::find($userId);
        // dd($userId);
    
        // 登録処理 
        $user->update([
            // 'id' => $userId,
            'fullname' => $request->fullname,
            'postcode' =>$request->postcode,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);
        $user->save();
        
        return view('home.payment');
    }

}
