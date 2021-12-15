<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory Management System Login</title>
    <link rel="shortcut icon" href="/webs/images/home/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/login/assets/css/login.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- fontawesome -->
    <link href="/assetss/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/assetss/fontawesome/css/brands.css" rel="stylesheet">
    <link href="/assetss/fontawesome/css/solid.css" rel="stylesheet">
</head>

<body class="">
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card rounded-md">
                <div class="row no-gutters">
                <div class="col-md-1" style="background-color: #d0d0ce;"></div>

                <div></div>
                    <div class="col-md-5">
                        <img src="https://i1.wp.com/www.pival.com/wp-content/uploads/2017/08/inventory-management-system.jpg?fit=1500%2C1000&ssl=1" alt="login" class="login-card-img">
                     </div>
                    <div class="col-sm-5 rounded-md" >
                        <div class="card-body">
                            <!-- <div class="brand-wrapper">
                                <img src="/login/assets/images/logo.svg" alt="logo" class="logo">
                            </div> -->
                            <p class="login-card-description text-bold ">Sign into your account</p>
                            <form action="{{route('checkLogin')}}" method="POST">
                                @csrf
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has($msg))
                                <div class="alert alert-{{ $msg }} alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    {{ Session::get($msg) }}
                                </div>
                                @endif
                                @endforeach
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                            
                                    <input type="email" name="email" id="email" class="form-control"  placeholder="Email address" required="" value="{{old('email')}}">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="***********" required="">
                                </div>
                                <input  name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                            </form>
                            <!-- <p class="login-card-footer-text">Don't have an account? <a href="/register" class="text-reset">Register here</a></p> -->
                            <nav class="login-card-footer-nav">
                                <a href="#!">Terms of use.</a>
                                <a href="#!">Privacy policy</a>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-1" style="background-color: #d0d0ce;"></div>

                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
