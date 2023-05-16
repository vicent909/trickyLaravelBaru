@extends('layouts.admin')

@section('content')
    
    <!-- Begin Page Content -->
<div class="container-fluid">

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
            <table class="table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $item->id }}</td>
                </tr>
                <tr>
                    <th>Product</th>
                    <td>{{ $item->product->title }}</td>
                </tr>
                <tr>
                    <th>Total Transaksi</th>
                    <td>Rp. {{ $item->transaction_total }}</td>
                </tr>

            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection