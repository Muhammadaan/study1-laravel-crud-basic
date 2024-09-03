@extends('layout.template')

@section('title')
    Product
@endsection

@section('content')
<div class="row g-0 text-center" style="padding-top: 50px">
    <div class="col-sm-6 col-md-8 text-start"><h3>Judul</h3></div>
    <div class="col-6 col-md-4 text-end"><a  href="{{route('product.create')}}" class="btn btn-primary">Create Data</a> </div>
  </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Price</th>
                <th scope="col">Color</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $prod )
            <tr>
                <td>{{$prod->name}}</td>
                <td>{{$prod->price}}</td>
                <td>{{$prod->color}}</td>
                <td>
                    <a href="{{route('product.show', $prod->id)}}" class="btn btn-primary">detail</a>
                    <a href="{{route('product.edit', $prod->id)}}" class="btn btn-primary">Edit</a> 
                    <form action="{{ route('product.destroy', $prod->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                        class="btn btn-danger">Delate</button>
                    </form>
                    </td>
            </tr>
            @endforeach
         
            
        </tbody>
    </table>
@endsection
