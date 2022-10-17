<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * 管理者画面TOP
     */
    public function itemsTop()
    {
        return view('home');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item
            ::where('items.status', 'active')
            ->select()
            ->get();

        return view('item.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'price' => 'integer',
                'stock' => 'integer',
                'image' => 'mimes:jpeg,png,jpg,gif,svg',
            ],
            ['name.required' => '商品名を入力してください。',
            'price.integer' => '半角数字で入力してください。',
            'stock.integer' => '半角数字で入力してください。',
            'image.mimes' => '画像を選択してください。']
            );

            // 画像のネーミングおよび保存場所の指定
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath,$name);
            
            // 登録処理 
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type_id' =>$request->type,
                'price' => $request->price,
                'stock' => $request->stock,
                'image' => $name,
                'detail' => $request->detail,
            ]);
            return redirect('/items');
        }

        return view('item.add');
    }

    // 商品一覧編集画面の表示
    public function edit($id)
   {
       $item = Item::find($id);
       return view('item.edit', compact('item'));
   }

    // 商品一覧の編集   
   public function update(Request $request, $id)
   {
        $this->validate($request, [
            'name' => 'max:100',
            'price' => 'integer',
            'stock' => 'integer',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
            ],
            ['name.max:100' => '100文字以内で入力してください。',
            'price.integer' => '半角数字で入力してください。',
            'stock.integer' => '半角数字で入力してください。',
            'image.mimes' => '画像を選択してください。']
        );
  
        $item = Item::find($id);
        $name = $item->image;
        if( $request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath,$name);
        }
        $item->update([
            'name'=>$request->name,
            'type_id' =>$request->type,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $name,
            'detail' => $request->detail,
        ]);
        $item->save();

       return redirect('/items');
   }

    // 商品削除
    public function destroy($id)
   {
       $item = Item::find($id);
       $item->delete();

       return redirect('/items');
   }   
}

