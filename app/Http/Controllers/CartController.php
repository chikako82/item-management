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
        $totalQuantity = \Cart::getTotalQuantity();
        
        return view('home.cart', compact('cartItems','types','totalQuantity'));
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
        // 数量に負の数・0が入力できないようvalidateを設定
        $this->validate($request, [
            'quantity' => 'integer', 'min:1',
        ]);

        // 在庫より注文数が多い場合はエラーメッセージと共にCartListにリダイレクト
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
        
        $totalQuantity = \Cart::getTotalQuantity();
        if($totalQuantity == 0){
            session()->flash('success', 'Item Cart Remove Successfully !');
            return redirect('/home');
        }
        else {
        return redirect('/home/cart');
        }
    }

    public function clearAllCart()
    {
        \Cart::clear();

        // session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect('/home');
    }
}
