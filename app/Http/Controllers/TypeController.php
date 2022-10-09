<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeController extends Controller
{
    // Type登録画面の表示および登録処理
    public function index()
    {
        return view('item.index');
    }
}