@extends('layouts.common')

@section('content')
<div class="container mt-5" style="background-color:white; height:50vw">
    <h4 class="pt-3">{{$item->name}}</h4>
    <hr class="bg-dark" />

    <div class="product-container">
        <div class="img-wrapper">
            <img src="{{ asset('images') }}/{{ $item->image }}" class="card-img-top" />
        </div>
        <div class="card-body">
            <p style="font-weight:bold">{{ $item->name }}</p>
            <p>{{ $item->price }}円</p>
            <p style="font-size:smaller">{{ $item->datail }}</p>
        </div>
    </div>

    <hr>
        <div style="text-align: center">
            <a class="buy-btn btn btn-outline-primary btn-sm" href="#" role="button">ADD TO BAG</a>    
        </div>
</div>

@endsection