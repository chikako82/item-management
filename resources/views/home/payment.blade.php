@extends('layouts.common')

@section('content')
<main class="cart-main" style="background-color:white;">
    <div class="container cart-top mt-5 px-6 mx-auto">
        <div>
            <h4 class="pt-4">PAYMENT</h4>
            <hr class="bg-dark" />

            <div class="content">
                <form action="{{ route('charge') }}" method="POST">
                    @csrf
                        <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="{{ env('STRIPE_KEY') }}"
                            data-amount="{{ Cart::getTotal()}}"
                            data-name="Stripe Demo"
                            data-label="Proceed with the payment"
                            data-description="TECH I.S item-management Stripe Demo"
                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                            data-locale="auto"
                            data-currency="JPY">
                        </script>
                </form>
            </div>

            <div class="mt-3 pb-5">
                <button class="btn btn-outline-primary" onClick="history.back();">Back</button>
            </div>

        
        </div>
    </div>
</main>
@endsection