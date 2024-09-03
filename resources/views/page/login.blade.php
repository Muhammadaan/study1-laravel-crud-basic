<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" href="css/style-custom.css">
</head>

<body>

    <div class="container-center">

        <div class="container col col-lg-6 ">
            <form method="POST" action="{{route('login')}}" >
                @csrf
                <h4>Login</h4>
                
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email"
                        placeholder="name@example.com">
                    @error('email')
                        <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="*********">
                    @error('password')
                        <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Button</button>

                </div>
            </form>

        </div>



    </div>



</body>

</html>