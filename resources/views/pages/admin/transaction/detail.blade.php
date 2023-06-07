@extends('layouts.admin')

@section('content')
    
    <!-- Begin Page Content -->
<div class="container-fluid">
        <a class="btn btn-secondary mb-2" href="{{ route('transaction.index') }}">
            <i class="fas fa-angle-left text-white-50"></i>  Kembali 
        </a>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaksi {{ $item->user->name }}</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $item->id }}</td>
                </tr>
                <tr>
                    <th>Nama Customer</th>
                    <td>{{ $item->user->name }}</td>
                </tr>
                <tr>
                    <th>Total Transaksi</th>
                    <td>Rp. {{ $item->transaction_total }}</td>
                </tr>
                <tr>
                    <th>Detail Transaksi</th>
                    <td>
                        <table class="table table-bordered">
                            <tr>
                                <th>No.</th>
                                <th>Produk</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total Price</th>
                            </tr>
                            <?php $no = 1; ?>
                            @forelse ($details as $detail)
                                <tr>
                                    <th>{{ $no++ }}</th>
                                    <th>{{ $detail->product_title }}</th>
                                    <th>{{ $detail->sizes->size_name }}</th>
                                    <th>{{ $detail->colors->color_name }}</th>
                                    <th>Rp. {{ $detail->price }}</th>
                                    <th>{{ $detail->quantity }}</th>
                                    <th>Rp. {{ $detail->price_end }}</th>
                                </td>
                            </tr>
                            @empty
                                <td colspan="7" class="text-center">
                                    Data Kosong
                                </td>
                            @endforelse
                        </table>
                    </td>
                </tr>

            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection