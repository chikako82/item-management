@extends('layouts.common')

@section('content')
<main class="cart-main" style="background-color:white;">
    <div class="container cart-top mt-5 px-6 mx-auto">
        <div>
            <h4 class="pt-4">PLEASE ENTER THE DELIVERY DETAILS</h4>
            <hr class="bg-dark" />

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('user-info') }}">
            @csrf
                <div class="form-group">
                    <label for="inputEmail1">Email</label>
                    <!-- ユーザー登録時のメールアドレスを取得（読み取り専用で表示） -->
                    <input type="email" class="form-control" id="inputEmail1" aria-describedby="emailHelp" placeholder="{{ $userEmail }}" readonly>
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                
                <div class="form-group">
                        <label for="fullname">Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" required>
                </div>
                <div class="form-group">
                        <label for="postcode">Post code</label>
                        <input type="text" class="form-control" id="postcode" name="postcode" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="form-group">
                        <label for="phone">Phone number</label>
                        <!-- pattern属性で電話番号の形式をチェック（ハイフンは省略可） -->
                        <input type="tel" pattern="\d{2,4}-?\d{2,4}-?\d{3,4}" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="pb-5">
                    <button type="submit" class="btn btn-primary mr-2">SAVE</button>
                    <button type="reset" class="btn btn-outline-danger mr-2">Reset</button>
                    <button class="btn btn-outline-primary" onClick="history.back();">Back</button>
                </div>
            </form>

        
        </div>
    </div>
</main>
@endsection