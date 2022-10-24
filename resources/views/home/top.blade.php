@extends('layouts.common')

@section('content')
    @if ($message = Session::get('success'))
        <div class="mt-5 alert alert-primary" role="alert"">
                <p>{{ $message }}</p>
        </div>
    @endif

@endsection