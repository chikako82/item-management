@extends('layouts.common')

@section('content')
<main class="cart-main" style="background-color:white;">
    <div class="container cart-top px-6 mx-auto">
            <div>
                <!-- @if ($message = Session::get('success'))
                <div class="p-4 mb-3 bg-green-400 rounded">
                    <p class="text-green-800">{{ $message }}</p>
                </div>
                @endif -->

                <h3 class="text-3xl text-bold mt-5">Order List</h3>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                              <th class="hidden md:table-cell"></th>
                              <th>Name</th>
                              <th>Qtd Quantity</th>
                              <th>Price</th>
                              <!-- <th class="table-th">Remove</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderItems as $item)
                            <tr class="table-row">
                              <td>
                                <a href="{{ url('home/'.$item->id.'/show') }}">
                                  <img src="{{ asset('images') }}/{{ $item->attributes->image }}">
                                </a>
                              </td>
                              <td>
                                <a href="{{ url('home/'.$item->id.'/show') }}">
                                  <p class="cart-item-name">{{ $item->name }}</p>
                                </a>
                              </td>
                              <td>
                                <p class="cart-item-name">{{ $item->quantity }}</p>

                                <!-- <form action="{{ url('home/cart/update') }}" method="POST" class="form-inline">
                                    @csrf -->
                                        <!-- <div class="form-group col-md-5">
                                            <input type="hidden" name="id" value="{{ $item->id}}" >
                                            <input type="number" name="quantity" value="{{ $item->quantity }}" 
                                                class="text-center form-control-plaintext"/>
                                        </div>
                                            <button type="submit" class="buy-btn btn btn-outline-primary btn-sm mb-2">update</button>
                                </form>
                                    
                                </div> -->
                              </td>
                              <td>
                                {{ $item->price }}円
                              </td>
                              <!-- <td>
                                <form action="{{ url('home/cart/remove') }}" method="POST">
                                  @csrf
                                  <input type="hidden" value="{{ $item->id }}" name="id">
                                  <button class="buy-btn btn btn-danger btn-sm mb-2">x</button>
                                </form>
                              </td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                        <div class="text-total">
                         Total: {{ Cart::getTotal() }} 円
                        </div>
                        
                        <div class="cart-btn-div mb-3">
                          <a href="{{ route('delivery') }}" class="cart-btn">
                            <button class="buy-btn btn btn-primary mb-5">Continue to checkout</button>
                          </a>
                          
                          <a href="{{ url('home/cart') }}" class="cart-btn">
                            <button class="buy-btn btn btn-outline-danger mb-5">Back to Cart List</button>
                          </a>
                        </div>


                </div>
            </div>
    </div>
</main>
@endsection