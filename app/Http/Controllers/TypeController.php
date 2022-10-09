<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    /**
     * カテゴリー一覧
     */
    public function index()
    {
        // カテゴリー一覧取得
        $types = Type::orderBy('created_at', 'asc')->get();
        return view('type.index', compact('types'));
    }

    // Type登録画面の表示および登録処理
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // カテゴリー登録
            Type::create([
                'name' => $request->name,
            ]);

            return redirect('/types');
        }

        return view('type.add');
    }

    // カテゴリー編集画面の表示
    public function edit($id)
   {
       $type = Type::find($id);
       return view('type.edit', compact('type'));;
   }

    // カテゴリー編集   
   public function update(Request $request, $id)
   {
       $type = Type::find($id);
       $type->name = request('name');
       $type->save();

       return redirect('/types');
    //    return redirect('/category')->with('message', 'カテゴリーが編集されました。');
   }
}