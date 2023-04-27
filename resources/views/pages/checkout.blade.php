@extends('layouts.checkout')
@section('title', 'Checkout')

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
                            <li class="breadcrumb-item ">
                                Semua Produk
                            </li>
                            <li class="breadcrumb-item active">
                                Checkout
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <!-- card kiri -->
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        <h1>Keranjang</h1>
                        <div class="produk">
                            <table class="table table-responsive-sm text-center">
                                <thead>
                                    <tr>
                                        <td>Picture</td>
                                        <td>Nama Produk</td>
                                        <td>Ukuran</td>
                                        <td>Warna</td>
                                        <td>Jumlah</td>
                                        <td>Harga</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="frontend/images/marun.jpeg" height="80">
                                        </td>
                                        <td class="align-middle" width="200">
                                            Kaos Wanita Raglan Lengan 3/4
                                        </td>
                                        <td class="align-middle">
                                            L
                                        </td>
                                        <td class="align-middle">
                                            Marun
                                        </td>
                                        <td class="align-middle">
                                            1
                                        </td>
                                        <td class="align-middle">
                                            Rp. 150.000
                                        </td>
                                        <td class="align-middle">
                                            <a href="#">
                                                <img src="frontend/images/ic_remove.png" height="12">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="frontend/images/hitam.jpeg" height="80">
                                        </td>
                                        <td class="align-middle" width="200">
                                            Kaos Wanita Raglan Lengan 3/4
                                        </td>
                                        <td class="align-middle">
                                            XL
                                        </td>
                                        <td class="align-middle">
                                            Hitam
                                        </td>
                                        <td class="align-middle">
                                            1
                                        </td>
                                        <td class="align-middle">
                                            Rp. 150.000
                                        </td>
                                        <td class="align-middle">
                                            <a href="#">
                                                <img src="frontend/images/ic_remove.png" height="12">
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- card kanan -->
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>
                            Total Payment
                        </h2>
                        <hr>
                        <table>
                            <tr>
                                <th width="50%">Harga</th>
                                <td class="text-right" width="50%">Rp. 300.000</td>
                            </tr>
                            <tr>
                                <th width="50%">Ongkir</th>
                                <td class="text-right" width="50%">Rp. 20.000</td>
                            </tr>
                            <tr class="">
                                <th width="50%">Sub Total</th>
                                <td class="text-right" width="50%">Rp. 320.000</td>
                            </tr>
                        </table>

                        <div class="row mt-2" >
                            <div class="container">
                                <a href="{{ route('checkout-success') }}" class="btn btn-checkout" >
                                    Checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </main>
@endsection