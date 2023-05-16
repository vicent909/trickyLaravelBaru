@extends('layouts.admin')

@section('content')
    
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Variant</h1>
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
            {{-- <form action="{{ route('product.update', $item->id) }}" method="POST">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label for="title" >Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $item->title }}">
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" rows="10" class="d-block w-100 form-control">{{ $item->about }}</textarea>
                </div>
                <div class="form-group">
                    <label for="price" >Price</label>
                    <input type="number" class="form-control" name="price" placeholder="Price" value="{{ $item->price }}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Ubah
                </button>
            </form> --}}

            <form action="{{ route('variant.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="products_id" >Product</label>
                    <input type="text" class="form-control" name="products_id" placeholder="Product Id" value="{{ $item->product->id }}">
                </div>
                <div class="form-group">
                    <label for="sizes_id">Size</label>
                    <select name="sizes_id" required class="form-control">
                        <option value="{{ $item->size->id }}">{{ $item->size->size_name }}</option>
                        <hr>
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
                        <option value="{{ $item->color->id }}">{{ $item->color->color_name }}</option>
                        @foreach ($colors as $color)
                            <option value="{{ $color->id }}">
                                {{ $color->color_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="price" >Quantity</label>
                    <input type="number" class="form-control" name="quantity" placeholder="Quantity" value="{{ $item->quantity }}">
                </div>
                <div class="form-group">
                    <label for="price" >Price</label>
                    <input type="number" class="form-control" name="price" placeholder="Price" value="{{ $item->price }}">
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