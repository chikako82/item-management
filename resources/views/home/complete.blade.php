@extends('layouts.common')

@section('content')
<main class="cart-main" style="background-color:white;">
    <div class="container cart-top mt-5 px-6 mx-auto">
        <div>
            <h4 class="pt-4">THANK YOU!</h4>
            <hr class="bg-dark" />

            <div class="content">
                <p class="text-center pay-msg">Payment is completed.</h5>
                <p class="text-center pay-msg2 mt-5">Thank you for shopping with us!</p>
            </div>

            <div class="pb-5">
                <a href="{{ route('home')}}" class="cart-btn buy-btn btn btn-outline-primary mb-1 mr-2">HOME</a>
            </div>

        
        </div>
    </div>
</main>
@endsection