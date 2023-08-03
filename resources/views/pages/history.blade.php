@extends('layouts.app')
@section('title', 'History')

@section('content')
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <h1>Riwayat Pesanan Anda</h1>
            <hr>
            
            <table class="table table-borderless table-striped table-hover" style="margin: 10px; background-color: #ffffff ">
                <thead>
                    <tr>
                        <td width="10%" >No.</td>
                        <td>Id Transaksi</td>
                        <td>Waktu Transaksi</td>
                        <td>Status Pembayaran</td>
                        <td>Status Pesanan</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    @forelse ($items as $item)
                    <form action="{{route('done', $item->id)}}" method="GET">
                        @csrf
                        <tr>
                            <td>{{ $no++ }}.</td>
                            <td>TRICKY-{{ $item->id }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->transaction_status }}</td>
                            <td name="handle_status">{{ $item->handle_status }}</td>
                            <td>
                                <button type="submit" class="btn btn-block btn-outline-success {{ $item->handle_status=='SENT' ? '' : 'disabled' }}">Pesanan Diterima</button>
                            </td>
                        </tr>
                    </form>    
                    @empty
                        <td colspan="5" class="text-center">
                            Data Kosong
                        </td>
                    @endforelse
                </tbody>
            </table>
            {{ $items->links() }}
        </div>
    </section>    
</main>
@endsection