@extends('adminlte::page')

@section('title', 'カテゴリー一覧')

@section('content_header')
    <h1>カテゴリー一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">カテゴリー一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('types/add') }}" class="btn btn-default">カテゴリー登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>カテゴリー名</th>
                                <th>編集</th>
                                <th>削除</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if (count($types) > 0)
                            @foreach ($types as $type)
                                <tr>
                                    <td>{{ $type->id }}</td>
                                    <td>{{ $type->name }}</td>
                                    <td>
                                        <a href="{{ url('types/'.$type->id.'/edit') }}">
                                            <button type="button" class="btn btn-outline-danger">編集</button></td>
                                        </a>
                                    <td><button type="button" class="btn btn-outline-primary">削除</button></td>
                                </tr>
                            @endforeach
                        
                            @else
                            <tr>
                            <td colspan="5">追加されたカテゴリーはありません。</td>
                            </tr>

                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
