<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Item;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    /**
     * 商品一覧
     */
    public function top()
    {
        $types = Type::all();
        return view('home.top', compact('types'));
    }

    public function index($id)
    {
        // 商品一覧取得
        $type = Type::all();
        $current_type = Type::find($id);
        $items = Item::where('type_id', $current_type->id)->get();
        
        return view('home.index', [
            'types' => $type,
            'current_type_name' => $current_type->name,
            'items' => $items,
        ]);
    }
}
