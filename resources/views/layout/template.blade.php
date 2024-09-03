<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title> 
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href=" {{asset('css/style-custom.css')}}">
   
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            @include('layout.sidebar')
          <!-- Page Content -->
          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            
            <div>
                @yield('content')
            </div>
            
          </main>
        </div>
      </div>
    
</body>
</html>