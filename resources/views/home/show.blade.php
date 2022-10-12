@extends('layouts.common')

@section('content')
<div class="container show mt-5" style="background-color:white;">
    <h4 class="pt-3">{{$item->name}}</h4>
    <hr class="bg-dark" />

    <div class="row product-container">
        <div class="col-xs-12 col-md-6 img-wrapper">
            <img src="{{ asset('images') }}/{{ $item->image }}" class="card-img-top" />
        </div>
        <div class="col-xs-12 col-md-6 card-body show-body">
            <p class="show-text" style="font-weight:bold">{{ $item->name }}</p>
            <p class="show-text">{{ $item->price }}円</p>
            <p class="show-text" style="font-size:smaller">【商品詳細】</p>
            <p class="show-text" style="font-size:smaller">{{ $item->detail }}</p>
        </div>
    </div>

    <hr>
        <div style="text-align: center">
            <a class="buy-btn btn btn-outline-primary btn-sm" href="#" role="button">ADD TO BAG</a>    
        </div>
</div>

@endsection