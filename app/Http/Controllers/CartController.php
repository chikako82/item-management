<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Item;

class CartController extends Controller
{
    //
    public function cartList()
    {
        $types = Type::all();
        $cartItems = \Cart::getContent();
        
        return view('home.cart', compact('cartItems','types'));
    }

    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        // session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect('/home/cart');
    }

    public function updateCart(Request $request)
    {
        // 数量に負の数が入力できないようvalidateを設定
        $this->validate($request, [
            'quantity' => 'integer', 'min:0',
        ]);

        $currentItemId = Item::find($request->id);
        $currentItemStock = $currentItemId->stock;
        // dd($currentItemStock);

        if($request->quantity > $currentItemStock) {
            return redirect('/home/cart')->with('errorMessage', 'Sorry, out of stock. ');
        }
        else {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        return redirect('/home/cart');
        }
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        // session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect('/home/cart');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect('/home');
    }
}
