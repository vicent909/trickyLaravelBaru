@extends('layouts.admin')

@section('content')
    
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Variant</h1>
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
            <form action="{{ route('variant.store', $item->products_id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="products_id" >Product</label>
                    <input type="text" class="form-control" name="products_id" placeholder="Product Id" value="{{ $item->id }}">
                </div>
                <div class="form-group">
                    <label for="sizes_id">Size</label>
                    <select name="sizes_id" required class="form-control">
                        <option value="{{ old('sizes_id') }}">Pilih Size</option>
                        @foreach ($sizes as $size)
                            <option value="{{ $size->id }}">
                                {{ $size->size_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="colors_id">Color</label>
                    <select name="colors_id" required class="form-control">
                        <option value="{{ old('colors_id') }}">Pilih Color</option>
                        @foreach ($colors as $color)
                            <option value="{{ $color->id }}">
                                {{ $color->color_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="price" >Quantity</label>
                    <input type="number" class="form-control" name="quantity" placeholder="Quantity" value="{{ old('quantity') }}">
                </div>
                <div class="form-group">
                    <label for="price" >Price</label>
                    <input type="number" class="form-control" name="price" placeholder="Price" value="{{ old('price') }}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                </button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection