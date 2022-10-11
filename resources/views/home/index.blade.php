@extends('layouts.common')

@section('content')
<div class="container mt-5">
<h2 class="font-weight-bold pt-3">{{$current_type_name}}</h3>
<hr class="bg-dark" />
<div class="row row-cols-5 mb-5">
@foreach($items as $item)
    <div class="card">
      <img style="width: 100%; height: 15vw; object-fit: cover;" src="{{ asset('images') }}/{{ $item->image }}" class="card-img-top" />
      <div class="card-body">
        <p class="card-title font-weight-bold" style="display:inline;">{{ $item->name }}</p><br>
        <p class="card-title" style="float: left">{{ $item->price }} 円</p>
        <p class="card-text" style="float: right">残り{{ $item->stock }}点</p>
      </div>
    </div>
@endforeach
  </div>
</div>

@endsection