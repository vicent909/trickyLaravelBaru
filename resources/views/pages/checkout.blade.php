@extends('layouts.app')
@section('title', 'Checkout')

@section('content')
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            
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
                                        <td>Produk</td>
                                        <td>Ukuran</td>
                                        <td>Warna</td>
                                        <td>Qty</td>
                                        <td>Harga</td>
                                        <td>Total</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total=0; ?>
                                    @forelse ($items as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ Storage::url( $item->galleries->first()->image ) }}" height="80">
                                            </td>
                                            <td class="align-middle" width="200">
                                                {{ $item->product->title }}
                                            </td>
                                            <td class="align-middle">
                                                {{ $item->size->size_name }}
                                            </td>
                                            <td class="align-middle">
                                                {{ $item->color->color_name }}
                                            </td>
                                            <td class="align-middle">
                                                {{ $item->quantity }}
                                            </td>
                                            <td class="align-middle">
                                                Rp. {{ $item->product->price }}
                                            </td>
                                            <td class="align-middle">
                                                <?php 
                                                    $quantity = (int)$item->quantity;
                                                    $harga_satuan = (int)$item->product->price;

                                                    $total_satuan = $harga_satuan * $quantity;

                                                    echo $total_satuan;
                                                ?>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('checkout-remove', $item->id) }}">
                                                    @method('post')
                                                    <img src="frontend/images/ic_remove.png" height="12">
                                                </a>
                                            </td>
                                        </tr>
                                        <?php 
                                            $total+= $total_satuan;
                                        ?>
                                    @empty
                                        <td colspan="8" class="text-center">
                                            Keranjang Masih Kosong
                                        </td>
                                    @endforelse
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
                                <td class="text-right" width="50%">Rp. <?php echo $total ?> </td>
                            </tr>
                            <tr>
                                <th width="50%">Ongkir</th>
                                <td class="text-right" width="50%">Rp. 20.000</td>
                            </tr>
                            <tr>
                                <td colspan="2" >
                                    <hr>
                                </td>
                            </tr>
                            <?php  
                                $ongkir = (int)20000;

                                $total_akhir = $total + $ongkir
                            ?>
                            <tr class="">
                                <th width="50%">Sub Total</th>
                                <td class="text-right" width="50%">Rp. <?php echo $total_akhir ?></td>
                            </tr>
                        </table>

                        <div class="row mt-2" >
                            <div class="container">
                                <a href="{{ route('checkout-process') }}" class="btn btn-checkout" >
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