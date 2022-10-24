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
            <p class="show-text" style="font-weight:bold; font-size:larger">{{ $item->name }}</p>
            <p class="show-text">{{ $item->price }}円</p>
            <p class="show-text" style="font-size:smaller">商品詳細</p>
            <p class="show-text" style="font-size:smaller">{{ $item->detail }}</p>
            @if($item->stock == 0)<p class="show-text" style="color:red; font-weight:bold; font-size:larger;">SOLD OUT</p>@endif
        </div>
    </div>

    <hr>
        <!-- <div style="text-align: center">
            <a class="buy-btn btn btn-outline-primary btn-sm mb-2 @if($item->stock == 0) disabled @endif" href="#" role="button" @if($item->stock == 0)tabindex="-1" @endif>ADD TO BAG</a>
        </div> -->
        <div class="cart-btn-div mb-3">
            <form action="{{ url('home/cart') }}" method="POST" enctype="multipart/form-data" class="cart-btn">
                @csrf
                <input type="hidden" value="{{ $item->id }}" name="id">
                <input type="hidden" value="{{ $item->name }}" name="name">
                <input type="hidden" value="{{ $item->price }}" name="price">
                <input type="hidden" value="{{ $item->image }}"  name="image">
                <input type="hidden" value="1" name="quantity">
                @if($item->stock == 0)
                <button type="submit" class="buy-btn btn btn-primary mb-2 mr-2" style="visibility: hidden;">Add To Cart</button>
                @else
                <button type="submit" class="buy-btn btn btn-primary mb-2 mr-2">Add To Cart</button>
                @endif
            </form>

        <div class="cart-btn">
            <button class="buy-btn btn btn-outline-primary mb-1" onClick="history.back();">Back</button>
        </div>
</div>
</div>

@endsection