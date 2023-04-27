@extends('layouts.app')
@section('title', 'Detail Produk')

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
                        <h1>Kaos Wanita Lengan 3/4</h1>
                        <hr>
                        <div class="gallery">
                            <div class="xzoom-container">
                                <img src="frontend/images/hitam.jpeg" class="xzoom" id="xzoom-default" xoriginal="frontend/images/hitam.jpeg">
                            </div>
                            <div class="xzoom-thumbs">
                                <a href="frontend/images/hitam.jpeg">
                                    <img src="frontend/images/hitam.jpeg" 
                                        class="xzoom-gallery"
                                        width="128"
                                        xpreview="frontend/images/hitam.jpeg"
                                    >
                                </a>
                                <a href="frontend/images/marun.jpeg">
                                    <img src="frontend/images/marun.jpeg" 
                                        class="xzoom-gallery"
                                        width="128"
                                        xpreview="frontend/images/marun.jpeg"
                                    >
                                </a>
                                <a href="frontend/images/pink.jpg">
                                    <img src="frontend/images/pink.jpg" 
                                        class="xzoom-gallery"
                                        width="128"
                                        xpreview="frontend/images/pink.jpg"
                                    >
                                </a>
                                <a href="frontend/images/biru.jpeg">
                                    <img src="frontend/images/biru.jpeg" 
                                        class="xzoom-gallery"
                                        width="128"
                                        xpreview="frontend/images/biru.jpeg"
                                    >
                                </a>
                            </div>
                        </div>
                        <h2>Detail Produk</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, dolorum animi? Fugit incidunt velit quidem odit quae iste perferendis, vero optio at placeat, molestias error neque dolores quo sunt rem.</p>
                    </div>
                </div>

                <!-- card kanan -->
                <div class="col-lg-4">
                    <div class="card card-details card-right ">
                        
                        <div class=" btn-container">
                            <div class="container">
                                <div class="row " style="align-items: center;">
                                    <h6 class="mr-2">Size : </h6>
                                    <div class="btn btn-size mr-1 active">
                                        M
                                    </div>
                                    <div class="btn btn-size mr-1">
                                        L
                                    </div>
                                    <div class="btn btn-size mr-1">
                                        XL
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row mt-2" style="align-items: center;">
                                    <h6 class="mr-2">Warna : </h6>
                                    <div class="btn btn-color btn-primary mr-1 active">
                                        Hitam
                                    </div>
                                    <div class="btn btn-color btn-primary mr-1">
                                        Putih
                                    </div>
                                </div>
                            </div>
                            <div class="my-2"></div>
                            <hr>
                            <table>
                                <tr>
                                    <th width="50%">
                                        Prize
                                    </th>
                                    <td width="50%" class="text-right">
                                        Rp. 154000
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <div class="row mt-2" >
                                <div class="container">
                                    <a href="{{ route('checkout') }}" class="btn btn-keranjang" >
                                        + Keranjang
                                    </a>
                                    <a href="{{ route('checkout') }}" class="btn btn-buynow">
                                        Beli Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </main>
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
                XXoffset: 15
            })
        })
    </script>
@endpush