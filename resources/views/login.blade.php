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

<nav class="flex items-center justify-between flex-wrap bg-blue-600 p-3 fixed w-full z-50">
      <div class="flex items-center flex-shrink-0 text-white mr-6 hovering">
        <svg class="px-2" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="50" height="50"viewBox="0 0 172 172">
        <g fill="yes" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" ><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#e67e22">
          <path d="M6.235,6.88c-0.1075,0.02688 -0.215,0.06719 -0.3225,0.1075c-3.34594,0.47031 -5.9125,3.30563 -5.9125,6.7725c0,3.80281 3.07719,6.88 6.88,6.88c3.80281,0 6.88,-3.07719 6.88,-6.88h16.0175c4.28656,0 6.51719,0.88688 8.17,2.365c1.62594,1.46469 2.94281,3.91031 4.085,7.74v0.1075l27.52,110.94c1.03469,3.93719 1.96188,7.98188 4.8375,11.2875c1.1825,1.37063 2.70094,2.48594 4.515,3.3325c-1.98875,2.39188 -3.225,5.38844 -3.225,8.7075c0,7.56531 6.19469,13.76 13.76,13.76c7.56531,0 13.76,-6.19469 13.76,-13.76c0,-2.52625 -0.73906,-4.8375 -1.935,-6.88h21.07c-1.19594,2.0425 -1.935,4.35375 -1.935,6.88c0,7.56531 6.19469,13.76 13.76,13.76c7.56531,0 13.76,-6.19469 13.76,-13.76c0,-3.53406 -1.43781,-6.69187 -3.655,-9.1375c0.38969,-1.04812 0.22844,-2.23062 -0.40312,-3.14437c-0.645,-0.92719 -1.69313,-1.47813 -2.82188,-1.47813h-52.5675c-5.29437,0 -7.36375,-1.12875 -8.815,-2.795c-1.43781,-1.63937 -2.41875,-4.54187 -3.44,-8.385v-0.1075l-1.505,-5.9125h93.8475c1.89469,0 3.44,-1.54531 3.44,-3.44v-82.56c0,-1.89469 -1.54531,-3.44 -3.44,-3.44h-115.67c-0.1075,0 -0.215,0 -0.3225,0l-3.87,-15.5875c0,-0.06719 0,-0.14781 0,-0.215c-1.31687,-4.43437 -3.01,-8.2775 -6.1275,-11.0725c-3.1175,-2.795 -7.45781,-4.085 -12.7925,-4.085h-22.8975c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM54.2875,44.72h110.8325v75.68h-92.1275zM101.48,51.6c-4.70312,0 -8.6,3.89688 -8.6,8.6c0,4.70313 3.89688,8.6 8.6,8.6h24.08c4.70313,0 8.6,-3.89687 8.6,-8.6c0,-4.70312 -3.89687,-8.6 -8.6,-8.6zM101.48,58.48h24.08c0.98094,0 1.72,0.73906 1.72,1.72c0,0.98094 -0.73906,1.72 -1.72,1.72h-24.08c-0.98094,0 -1.72,-0.73906 -1.72,-1.72c0,-0.98094 0.73906,-1.72 1.72,-1.72zM89.44,151.36c3.84313,0 6.88,3.03688 6.88,6.88c0,3.84313 -3.03687,6.88 -6.88,6.88c-3.84312,0 -6.88,-3.03687 -6.88,-6.88c0,-3.84312 3.03688,-6.88 6.88,-6.88zM134.16,151.36c3.84313,0 6.88,3.03688 6.88,6.88c0,3.84313 -3.03687,6.88 -6.88,6.88c-3.84312,0 -6.88,-3.03687 -6.88,-6.88c0,-3.84312 3.03688,-6.88 6.88,-6.88z"></path></g></g></svg>
        <span class="font-semibold text-xl tracking-tight "><a class="text-white"href="#home">Inventory MS</a></span>
      </div>
     
      <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto ">
        <div class="text-sm lg:flex-grow  text-end lg:text-right space-x-4 mr-8 hovering">
          <a href="./#home" class="mt-4  lg:inline-block lg:mt-0 text-white mr-8 text-lg">
          <!-- <i class="fas fa-home"></i>  -->
           <div class="hover:text-yellow-500">Home</div> 
          </a>
          <a href="./#about" class=" block mt-4 lg:inline-block lg:mt-0 text-white mr-8 text-lg" style="decolation:none">
          <!-- <i class="fa fa-user-plus"></i> -->
         <div class="hover:text-yellow-500">About Us</div> 
          </a>
          <a href="./#Service" class="block mt-4 lg:inline-block lg:mt-0 text-white  mr-8 text-lg">
           <div class="hover:text-yellow-500">Services</div>
          </a>
          <a href="./#Contact_us" class="block mt-4 decolation:none lg:inline-block lg:mt-0 text-white text-lg">
          <!-- <i class="fa fa-fw fa-envelope"></i> -->
         <div class="hover:text-yellow-500">Contact Us</div> 
          </a>
          
         <!-- <a class="bg-yellow-500 hover:bg-blue-600 text-white font-bold py-1  px-4 border border-yellow-500 rounded text-xl " href="{{route('getLogin')}}">Login</a> -->

        </div>
      </div> 
      
  </nav>
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

    
    <section>

<div class="flex flex-wrap justify-center bg-gray-600 p-6">
      <div class="flex flex-wrap mb-4 w-full">
        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 ">
          <h3 class="text-3xl py-4 text-white">About Us</h3>
          <p class="text-white">Inventory management systemis the process
                by which you track your goods throughout
                your entire supply chain,
          </p>
        </div>
        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 md:pl-8">
          <h3 class="text-3xl py-4 text-white"> Main</h3>
          <ul>
            <li><a href="#home" class="text-white"> Home</a></li>
            <li><a href="#about" class="text-white"> About Us</a></li>
            <li><a href="#Servises" class="text-white"> Service</a></li>
            <li><a href="#Contact" class="text-white"> Contact US</a></li>
          </ul>
        </div>
        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 ">
          <h3 class="text-3xl py-4 text-white">Other</h3>
          <ul>
            <li><a href="#" class="text-white"> Product</a></li>
            <li><a href="#" class="text-white"> Sales</a></li>
            <li><a href="#" class="text-white"> Stok in</a></li>
            <li><a href="#" class="text-white"> Stoct out</a></li>
            
          </ul>
        </div>
        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4">
          <h3 class="text-3xl py-4 text-white">Subscribe</h3>
          <form action="#">
            <div class="mb-4 mt-2">
              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" placeholder="Email" required />
            <button class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded mt-2" type="submit">Subscribe</button>
            </div> 
             
          </form> 
        </div>
      </div>
    </div>
    <!-- Right -->
    
</section>


<footer class="text-center text-white" style="background-color: #caced1;">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Images -->
    <section class="">
      <div class="row">
        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div class="bg-image hover-overlay ripple shadow-1-strong rounded"data-ripple-color="light">
            <img src="/assetss/img/home.jpg"class="w-100"/>
            <a href="#!">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);">
              </div>
            </a>
          </div>
        </div>

        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
            <img src="/assetss/img/a.jpg"class="w-100"/>
            <a href="#!">
              <div class="mask"style="background-color: rgba(251, 251, 251, 0.2);">
              </div>
            </a>
          </div>
        </div>

        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div class="bg-image hover-overlay ripple shadow-1-strong rounded"data-ripple-color="light">
            <img src="/assetss/img/d.jpg" class="w-100"/>
            <a href="#!">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);">
              </div>
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">

            <img src="/assetss/img/e.jpg" class="w-100" />

            <a href="#!">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"> 
              </div>
            </a>
          </div>
        </div>

        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div class="bg-image hover-overlay ripple shadow-1-strong rounded"data-ripple-color="light">
            <img src="/assetss/img/c.jpg"class="w-100"/>
            <a href="#!">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"> 
              </div>
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div
            class="bg-image hover-overlay ripple shadow-1-strong rounded"
            data-ripple-color="light"
          >
            <img
              src="/assetss/img/d.jpg"
              class="w-100"
            />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.2);"
              ></div>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: Images -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3 bg-gray-600">
    © 2022 Copyright:
    <a class="text-white" href="http://ims.klabstartupsacademy.rw/">klabstartupsacademy.rw</a>
  </div>
  <!-- Copyright -->
</footer>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
