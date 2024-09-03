<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  

</head>

<body>
  <div class="container-fluid">
    <div class="container">
      <div class="d-flex flex-wrap gap-3  gap-3">

        @foreach ($products as $product)
        <div class="card" style="width: 30%;">
            <div class="card-body">
              <h5 class="card-title">{{$product->name }}</h5>
              <p class="card-text"> {{$product->price}} </p>
              <p class="card-text">{{$product->color}} </p>
              <a href="#" class="btn btn-primary">Add To Cart</a>
            </div>
          </div>
        @endforeach
      
        
      </div>
    </div>
  </div>
</body>

</html>