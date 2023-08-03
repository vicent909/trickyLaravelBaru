@extends('layouts.checkout')
@section('title', 'Checkout Success')

@section('content')
<main>
    <div class="section-success d-flex align-items-center">
        <div class="col text-center">
            {{-- <img src="{{ url('frontend/images/success.png') }}" height="250px"> --}}
            <h1 class="mt-2">Oops!</h1>
            <p>Your transaction is unfinish. <br> Please contact our customer service.</p>
            <a href="{{ url('/') }}" class="btn btn-home-page mt-3 px-5">
                Home Page
            </a>
        </div>
    </div>
</main>
@endsection