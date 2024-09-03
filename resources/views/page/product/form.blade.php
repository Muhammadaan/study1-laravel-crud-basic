@extends('layout.template')

@section('title')
    Form
@endsection

@section('content')
    <form action="{{ $type === 'edit' ? route('product.update', $product->id) : route('product.store') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @if ($type === 'edit')
            @method('PUT') <!-- Untuk operasi update, kita menggunakan metode PUT -->
        @endif
        @csrf

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

            @if ($type == 'create')
                <h1 class="h2">Create Data</h1>
            @endif
            @if ($type == 'edit')
                <h1 class="h2">Edit Data</h1>
            @endif

        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $product->name ?? '') }}">
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Price</label>
            <input type="text" class="form-control" name="price" value="{{ old('price', $product->price ?? '') }}">
            @if ($errors->has('price'))
                <span class="text-danger"> {{ $errors->first('price') }} </span>
            @endif

        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Color</label>
            <input type="text" class="form-control" name="color" value="{{ old('color', $product->color ?? '') }}">

            @if ($errors->has('color'))
                <span class="text-danger"> {{ $errors->first('color') }} </span>
            @endif
        </div>
        <input type="file" name="image">
        @if ($errors->has('image'))
        <span class="text-danger"> {{ $errors->first('image') }} </span>
    @endif

        <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </div>


    </form>
@endsection
