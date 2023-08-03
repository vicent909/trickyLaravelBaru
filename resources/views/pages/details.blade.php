@extends('layouts.app')
@section('title', 'Detail Produk')

<style>
    .radio-button {
    display: flex;
    justify-content: center;
    align-items: center;
    }

    .radio-button input[type="radio"] {
    display: none;
    }

    .radio-button label {
    display: inline-block;
    padding: 8px;
    background-color: #eaeaea;
    border: 1px solid #ccc;
    border-radius: 10px;
    cursor: pointer;
    margin-right: 10px;
    }

    .radio-button input[type="radio"]:checked + label {
    background-color: #4286f4;
    color: #fff;
    }
</style>



@section('content')
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0 ">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                Produk
                            </li>
                            <li class="breadcrumb-item active">
                                Semua Produk
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <!-- card kiri -->
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        <h1>{{ $item->title }}</h1>
                        <hr>
                        @if($item->galleries->count())
                        <div class="gallery">
                            <div class="xzoom-container">
                                <img src="{{ Storage::url( $item->galleries->first()->image ) }}" 
                                    class="xzoom" 
                                    id="xzoom-default" 
                                    xoriginal="{{ Storage::url( $item->galleries->first()->image ) }}">
                            </div>
                            <div class="xzoom-thumbs">
                                @foreach ($item->galleries as $gallery)
                                    <a href="{{ Storage::url($gallery->image) }}">
                                        <img src="{{ Storage::url($gallery->image) }}" 
                                            class="xzoom-gallery"
                                            width="128"
                                            xpreview="{{ Storage::url($gallery->image) }}"
                                        >
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <h2>Detail Produk</h2>
                        <p>
                            {!! $item->about !!}
                        </p>
                    </div>
                </div>
                <!-- card kanan -->
                <div class="col-lg-4">
                    <div class="card card-details card-right ">
                        
                        <div class=" btn-container">
                            <div class="container">
                                {{-- <form action="" method="GET">
                                    <div class="row" style="align-items: center">
                                        <h6 class="mr-2">Warna : </h6>
                                        <div class="radio-button">
                                            @foreach ($colors as $color)
                                                <input type="radio" id="{{$color->color_name}}" name="color_id" value="{{$color->id}}">
                                                <label for="{{$color->color_name}}">{{$color->color_name}}</label>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="row" style="align-items: center">
                                        <h6 class="mr-2">Ukuran : </h6>
                                        <div class="radio-button">
                                            @foreach ($sizes as $size)
                                                <input type="radio" id="{{ $size->size_name }}" name="size_id" value="{{ $size->id }}">
                                                <label for="{{ $size->size_name }}">{{ $size->size_name }}</label>
                                            @endforeach
                                        </div>
                                    </div>  
                                </form> --}}
                                <div class="container mt-2" style="padding-left: 5px">
                                    <form action="{{ route('store_cart') }}" method="post" >
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user }}">
                                        <input type="hidden" name="products_id" value="{{ $item->id }}">
                                        <div class="row" style="align-items: center">
                                            <h6 class="mr-2">Warna : </h6>
                                            <div class="radio-button">
                                                @foreach ($colors as $color)
                                                    <input type="radio" id="{{$color->color_name}}" name="color_id" value="{{$color->id}}">
                                                    <label for="{{$color->color_name}}">{{$color->color_name}}</label>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="row" style="align-items: center">
                                            <h6 class="mr-2">Ukuran : </h6>
                                            <div class="radio-button">
                                                @foreach ($sizes as $size)
                                                    <input type="radio" id="{{ $size->size_name }}" name="size_id" value="{{ $size->id }}" onclick="">
                                                    <label for="{{ $size->size_name }}">{{ $size->size_name }}</label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="row" style="padding-left: 0px; align-items:center;">
                                            <label for="quantity">
                                                <h6>Quantity : </h6>
                                            </label>
                                            <input class="ml-2" type="number" name="quantity" id="quantity" value="1" min="1" style="width: 50px" >
                                        </div>

                                        <div class="" style="margin-left: -15px; margin-right: -15px">
                                            <hr>
                                            <p id="result">warna adalah</p>
                                            <table>
                                                <tr>
                                                    <th width="50%">
                                                        Harga:  
                                                    </th>
                                                    
                                                    <td id="resultText" width="50%" class="text-right">
                                                        Rp. {{ $item->price }}
                                                    </td>
                                                </tr>
                                            </table>
    
                                            <hr>
                                            
                                            @auth
                                                <button class="btn btn-block btn-keranjang" type="submit">
                                                    +Keranjang
                                                </button>
                                            @endauth
                                            @guest
                                                <a href="{{ route('login') }}" class="btn btn-buynow" >
                                                    Login / Register
                                                </a>
                                            @endguest
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="my-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </main>

  <script>
        const radioBtns = document.querySelectorAll(['input[name="color_id"]', 'input[name="size_id"]']);
        const result = document.getElementById('result');

        let findSelected = () => {
            let color = document.querySelector('input[name="color_id"]:checked').value;
            let size = document.querySelector('input[name="size_id"]:checked').value;
            let selectedColor = color ;
            let selectedSize = size;
            
            result.textContent = `warna dan ukuran: ${[selectedColor, selectedSize]}`;
        }

        radioBtns.forEach(radioBtn => {
            radioBtn.addEventListener("change", findSelected)
        });

        findSelected();

        // function loadDoc(){
        //     const xhttp = new XMLHttpRequest();
        //     xhttp.onload = function() {
        //         document.getElementByName("result").innerHTML =
        //         this.responseText;
        //     }
        //     xhttp.open("GET", 'berhasil');
        //     xhttp.send();
        // }

  </script>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{url('frontend/libraries/xzoom/xzoom.css')}}">
@endpush

@push('addon-script')
    <script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false,
                tint:'#333',
                Xoffset: 15
            })
        })

        // let radioBtns = document.querySelectorAll('input[name="color"]');
        // let result = document.getElementById('result');

        // let findSelected = () => {
        //     let selected = document.querySelector("input[name='color']:checked");
        //     console.log(selected);
            // result.textContent = 'warna adalah ${selected}';
        // }

    //     radioBtns.forEach(radioBtn => {
    //         radioBtn.addEventListener("change", findSelected)
    //     });

    //     findSelected();
    </script>
@endpush