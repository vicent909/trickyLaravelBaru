@extends('layouts.admin')

@section('content')
    
    <!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Transaction Tricky-{{$item->id}}</h1>
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
            <form action="{{ route('transaction.update', $item->id) }}" method="POST">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label for="handle_status">Status</label>
                    <select name="handle_status" id="" required class="form-control">
                        <option value="{{ $item->handle_status }}">
                            Jangan Ubah ({{$item->handle_status}})
                        </option>
                        <option value="PENDING">Pending</option>
                        <option value="SENT">Sent</option>
                        <option value="SUCCESS">Success</option>
                        <option value="FAILED">Failed</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Ubah
                </button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection