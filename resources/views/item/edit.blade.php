@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
    <h1>商品編集</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif
            
    
            <div class="card card-primary">
                <form action="{{ url('items/'.$item->id.'/edit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">商品名</label>
                            <input type="text" class="form-control" id="name" name="name"  value="{{ $item->name }}">
                        </div>

                        <div class="form-group">
                            <label for="type">カテゴリー</label>
                            <select class="form-control" id="type" name="type">
                                <option value="" disabled selected style="display: none;">カテゴリーを選択してください。</option>
                                @foreach(App\Models\Type::all() as $type)
                                    <option value="{{ $type->id }}" @if($type ->id == $item->type_id) selected @endif>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        
                            <div class="text-right mt-2">
                                <a type="button" href="{{ url('types') }}" class="btn btn-outline-secondary py-1" role="button">カテゴリー一覧</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price">金額（税込）</label>
                            <input type="number" class="form-control" id="price" name="price"  value="{{ $item->price }}">
                        </div>

                        <div class="form-group">
                            <label for="stock">在庫数</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="{{ $item->stock }}">
                        </div>

                        <div class="form-group">
                            <label for="image">画像アップロード</label>
                            <div><input type="file" id="image" name="image"></div>
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" value="{{ $item->detail }}">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">編集</button>
                    </div>
                </form>
            </div>
            <div class="my-4 ml-3">
                    <a href="{{ url('items/index') }}">>> 商品一覧へ</a>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
