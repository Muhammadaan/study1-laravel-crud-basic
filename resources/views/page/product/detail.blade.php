@extends('layout.template')

@section('title')
    detatil
@endsection

@section('content')
    
<h1>Detail</h1>
<p>Name :</p>
<p>{{$product->name}}</p>
<p>Price :</p>
<p>{{$product->price}}</p>
<p>Color :</p>
<p>{{$product->color}}</p>
<img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">

@endsection