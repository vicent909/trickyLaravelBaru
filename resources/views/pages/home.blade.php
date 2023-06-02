@extends('layouts.app')

@section('title')
    TRICKY
@endsection

@section('content')
    <!-- Header -->

    <header class="text-center">
        <h1>
            Wear Diffrent Everyday
            <br><hr color="white" style="width: 450px; ">
            With a Cool Tshirt
        </h1>
        <a href="#section-produk-beranda" class="btn btn-get-started px-4 mt-4">
            Get Started
        </a>
      </header>

      <div class="mt-5"></div>

      <section class="section-produk-beranda" id="produkBeranda">
        <div class="container">
            <div class="text-center mb-3 border-bottom">
                <h1>MOST POPULAR</h1>
            </div>
            <div class="section-produk-item row justify-content-center">
                @foreach ($items as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card-produk text-center d-flex flex-column" style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');">
                            <div class="produk-button mt-auto">
                                
                                <a href="{{ url('/details', $item->slug) }}" class="btn btn-produk px-4" >
                                    Detail Produk
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
      </section>
@endsection