@extends('layouts.common')

@section('content')
<div class="container mt-5">
  <h2 class="font-weight-bold pt-3">{{$current_type_name}}</h2>
  <hr class="bg-dark" />
  
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 mb-3 card-wrapper">  
    @foreach($items as $item)
      <div class="col card">
        <div class="card-img">
          <a href="{{ url('home/'.$item->id.'/show') }}"> 
            <img src="{{ asset('images') }}/{{ $item->image }}" class="card-img-top" /></a>
        </div>
          <div class="card-body">
            <a href="{{ url('home/'.$item->id.'/show') }}"> 
              <p class="card-title font-weight-bold" style="display:inline;">{{ $item->name }}</p></a><br>
              <p class="card-title" style="float: left">{{ $item->price }} 円</p>
              @if($item->stock == 0)
              <p class="card-text" style="float: right; color:red; font-weight:bold;">SOLD OUT</p>
              @elseif($item->stock < 10)
              <p class="card-text" style="float: right">残りわずか</p>
              @else
              <p class="card-text" style="float: right"></p>
              @endif
              <hr>
          </div>
          <div style="text-align: center">
            <a class="buy-btn btn btn-outline-primary btn-sm mb-2" href="#" role="button">ADD TO BAG</a>    
          </div>
      </div>
    @endforeach

    </div>
</div>

@endsection