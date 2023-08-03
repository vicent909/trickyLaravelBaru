@extends('layouts.admin')

@section('content')
    
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
    </div>

    <div class="row">
        <div class="card-body">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-md-2">
                        <label>Status Pesanan</label>
                        <select name="status" class="form-control" id="" onchange="this.form.submit()">
                            <option value="">Status</option>
                            <option value="PENDING" {{Request::get('status') == 'PENDING' ? 'selected' : ''}}>PENDING</option>
                            <option value="ON PROCESS" {{Request::get('status') == 'ON PROCESS' ? 'selected' : ''}}>ON PROCESS</option>
                            <option value="SUCCESS" {{Request::get('status') == 'SUCCESS' ? 'selected' : ''}}>SUCCESS</option>
                            <option value="FAILED" {{Request::get('status') == 'FAILED' ? 'selected' : ''}}>FAILED</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-0 mt-auto">
                        <button class="btn btn-primary" type="submit" >Filter</button>
                    </div>
                </div>
            </form>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered " width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID</th>
                            <th>Nama Customer</th>
                            <th>Total</th>
                            <th>Payment Status</th>
                            <th>Status Pesanan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse ($items as $item)
                            <tr>
                                <th width="5%" >{{ $no++ }}</th>
                                <th>{{ $item->id }}</th>
                                <th>{{ $item->user->name }}</th>
                                <th>Rp. {{ $item->transaction_total }}</th>
                                <th>{{ $item->transaction_status }}</th>
                                <th>{{ $item->handle_status }}</th>
                                <td>
                                    <a href="{{ route('transaction.show', $item->id ) }}" class="btn btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('transaction.edit', $item->id ) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('transaction.destroy', $item->id ) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td colspan="7" class="text-center">
                                Data Kosong
                            </td>
                        @endforelse
                    </tbody>
                </table>

                {{ $items->links() }}
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection