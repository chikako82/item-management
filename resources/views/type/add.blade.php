@extends('adminlte::page')

@section('title', 'カテゴリー登録')

@section('content_header')
    <h1>カテゴリー登録</h1>
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
                <form method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="カテゴリー名">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </form>
            </div>
            <div class="my-4 ml-3">
                <a href="{{ url('types') }}">>> カテゴリー一覧へ</a>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
