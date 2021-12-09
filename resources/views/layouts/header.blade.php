<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{Auth::user()->role}} Dashboard</title>
    <!-- General CSS Files -->
    <!-- // -->
    <link rel="stylesheet" href="/assets/css/app.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/assets/css/custom.css">
    <!-- // -->


    <link rel="stylesheet" href="/assets/css/app.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    @livewireStyles
    <link rel="stylesheet" href="/assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="/assets/css/header.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='/assets/img/favicon.ico' />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
</head>

<body>
    @livewireScripts
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                  collapse-btn"> <i data-feather="align-justify"></i></a></li>

                    </ul>

                </div>
                <ul class="navbar-nav navbar-right ">
                    @if(Auth::user()->gender == 'female')

                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="/assets/img/user.png" class="user-img-radious-style">
                            <span class="d-sm-none d-lg-inline-block"></span>
                        </a>
                        @else
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="/assets/img/users/user-8.png" class="user-img-radious-style">
                            <span class="d-sm-none d-lg-inline-block"></span></a>
                        @endif
                        <div class="dropdown-menu dropdown-menu-right pullDown text">
                            <div class="dropdown-title ">{{Auth::user()->firstName}}</div>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="px-2">
                                <h1 class="text-xl">Logout</h1>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                </ul>



            </nav>
            <div class="main-sidebar sidebar-style-2 py-4">
                <aside id="sidebar-wrapper">
                    <!-- <div class="sidebar-brand text-xl px-4 w"> -->
                    <!-- <a href="?"> <img alt="image" src="/assets/img/logo1.jpg" class="header-logo "/>  -->
                    <!-- <span class="logo-name">I_M_S</span> -->

                    <!-- </a> -->
                    <!-- </div> -->

                    <div class="flex ">
                        <div>
                            <svg class="px-2 " xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 172 172">
                                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none">
                                    <path d="M0,172v-172h172v172z" fill="none"></path>
                                    <g fill="#e67e22">
                                        <path d="M6.235,6.88c-0.1075,0.02688 -0.215,0.06719 -0.3225,0.1075c-3.34594,0.47031 -5.9125,3.30563 -5.9125,6.7725c0,3.80281 3.07719,6.88 6.88,6.88c3.80281,0 6.88,-3.07719 6.88,-6.88h16.0175c4.28656,0 6.51719,0.88688 8.17,2.365c1.62594,1.46469 2.94281,3.91031 4.085,7.74v0.1075l27.52,110.94c1.03469,3.93719 1.96188,7.98188 4.8375,11.2875c1.1825,1.37063 2.70094,2.48594 4.515,3.3325c-1.98875,2.39188 -3.225,5.38844 -3.225,8.7075c0,7.56531 6.19469,13.76 13.76,13.76c7.56531,0 13.76,-6.19469 13.76,-13.76c0,-2.52625 -0.73906,-4.8375 -1.935,-6.88h21.07c-1.19594,2.0425 -1.935,4.35375 -1.935,6.88c0,7.56531 6.19469,13.76 13.76,13.76c7.56531,0 13.76,-6.19469 13.76,-13.76c0,-3.53406 -1.43781,-6.69187 -3.655,-9.1375c0.38969,-1.04812 0.22844,-2.23062 -0.40312,-3.14437c-0.645,-0.92719 -1.69313,-1.47813 -2.82188,-1.47813h-52.5675c-5.29437,0 -7.36375,-1.12875 -8.815,-2.795c-1.43781,-1.63937 -2.41875,-4.54187 -3.44,-8.385v-0.1075l-1.505,-5.9125h93.8475c1.89469,0 3.44,-1.54531 3.44,-3.44v-82.56c0,-1.89469 -1.54531,-3.44 -3.44,-3.44h-115.67c-0.1075,0 -0.215,0 -0.3225,0l-3.87,-15.5875c0,-0.06719 0,-0.14781 0,-0.215c-1.31687,-4.43437 -3.01,-8.2775 -6.1275,-11.0725c-3.1175,-2.795 -7.45781,-4.085 -12.7925,-4.085h-22.8975c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM54.2875,44.72h110.8325v75.68h-92.1275zM101.48,51.6c-4.70312,0 -8.6,3.89688 -8.6,8.6c0,4.70313 3.89688,8.6 8.6,8.6h24.08c4.70313,0 8.6,-3.89687 8.6,-8.6c0,-4.70312 -3.89687,-8.6 -8.6,-8.6zM101.48,58.48h24.08c0.98094,0 1.72,0.73906 1.72,1.72c0,0.98094 -0.73906,1.72 -1.72,1.72h-24.08c-0.98094,0 -1.72,-0.73906 -1.72,-1.72c0,-0.98094 0.73906,-1.72 1.72,-1.72zM89.44,151.36c3.84313,0 6.88,3.03688 6.88,6.88c0,3.84313 -3.03687,6.88 -6.88,6.88c-3.84312,0 -6.88,-3.03687 -6.88,-6.88c0,-3.84312 3.03688,-6.88 6.88,-6.88zM134.16,151.36c3.84313,0 6.88,3.03688 6.88,6.88c0,3.84313 -3.03687,6.88 -6.88,6.88c-3.84312,0 -6.88,-3.03687 -6.88,-6.88c0,-3.84312 3.03688,-6.88 6.88,-6.88z"></path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="py-2"> <span class="font-semibold text-2xl tracking-tight py-1 ">Inventory_MS</span>
                        </div>
                    </div>
                    <ul class="sidebar-menu py-4">
                        <!-- <li class="menu-header"><h4 class="text-xl px-4">Main</h4></li> -->

                        <!-- /// -->
                        @if(Auth::user()->role == 'admin')
                        <li class="dropdown active">
                            <a href="{{route('getLandingPage')}}" class="nav-link"><i data-feather="monitor"></i><span class=" hover:text-indigo-500">Dashboard</span></a>
                        </li>
                        <li class="dropdown ">
                            <!-- ADDDDDD -->
                            <a href="{{route('getUsers')}}" class="nav-link"><i data-feather="user-check" class="text-black-700"></i><span class="">Users</span></a>
                        </li>

                        <li class="dropdown ">
                            <!-- ADDDDDD -->
                            <a href="{{route('getAllCompanies')}}" class="nav-link"><i data-feather="layout"></i><span class="">Companies</span></a>
                        </li>
                        <li class="dropdown ">
                            <!-- ADDDDDD -->
                            <a href="{{route('getAllCategories')}}" class="nav-link"><i data-feather="command"></i><span class="">Categories</span></a>
                        </li>

                        <li class="dropdown ">
                            <!-- ADDDDDD -->
                            <a href="{{route('getAllBrands')}}" class="nav-link">
                                <ion-icon name="clipboard" class="px-2"></ion-icon><span class="">Brands</span>
                            </a>
                        </li>
                        l @endif
                        @if(Auth::user()->role == 'owner')
                        <li class="dropdown">
                            <a href="{{route('getOwnerLandingPage',Auth::user()->company->id)}}" class="nav-link"><i data-feather="monitor" class=" w-7 h-7 text-blue-900"></i><span class="">Dashboard</span></a>
                        </li>
                        <li class="dropdown ">
                            <a href="{{route('getCompanyBranches',Auth::user()->company->id)}}" class="nav-link">
                                <ion-icon name="md-git-branch" class=" text-blue-900 px-1 w-7 h-7"></ion-icon> <span class="">Branches</span>
                            </a>
                        </li>
                        <li class="dropdown ">
                            <!-- ADDDDDD -->
                            <a href="{{route('getAllCategories')}}" class="nav-link"><i data-feather="command" class="w-7 h-7 text-blue-900"></i><span class="">Categories</span></a>
                        </li>

                        <li class="dropdown ">
                            <!-- ADDDDDD -->
                            <a href="{{route('getAllBrands')}}" class="nav-link">
                                <ion-icon name="clipboard" class="p-1 w-7 h-7 text-blue-900"></ion-icon><span class="">Brands</span>
                            </a>
                        </li>
                        <li class="dropdown ">
                            <a href="{{route('getCompanyProducts',Auth::user()->company->id)}}" class="nav-link"><svg class="w-6 h-6 text-blue-900 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                                </svg><span class="">Products</span></a>
                        </li>

                        <li class="dropdown ">
                            <a href="{{route('profitChart')}}" class="nav-link"><svg class="w-6 h-6 text-blue-900 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                                </svg><span class="">Charts</span></a>
                        </li>

                        @endif

                        @if(Auth::user()->role == 'manager')
                        <li class="dropdown ">
                            <a href="{{route('getCompanyProducts',Auth::user()->branch->company_id)}}" class="nav-link"><i data-feather="monitor"></i><span class="text-black">Products</span></a>
                        </li>
                        <li class="dropdown ">
                            <a href="{{route('getAddManyStocks')}}" class="nav-link"><i class="fa fa-plus"></i><span class="text-black">Add a stock</span></a>
                        </li>
                        <li class="dropdown ">
                            <a href="" class="nav-link"><i data-feather="monitor"></i><span class="text-black">Statistics</span></a>
                        </li>
                        <li class="dropdown ">
                            <a href="{{route('getStock',Auth::user()->branch->id)}}" class="nav-link"><i data-feather="monitor"></i><span class="text-black">View Stock</span></a>
                        </li>
                        <li class="dropdown ">
                            <a href="{{route('getBranchStockIn',Auth::user()->branch->id)}}" class="nav-link"><i data-feather="monitor"></i><span class="text-black">View StockIn history</span></a>
                        </li>
                        <li class="dropdown ">
                            <a href="{{route('getSellStocks',Auth::user()->branch->id)}}" class="nav-link"><i data-feather="monitor"></i><span class="text-black">Make Sales</span></a>
                        </li>
                        <li class="dropdown ">
                            <a href="{{route('getBranchStockOut',Auth::user()->branch->id)}}" class="nav-link"><i data-feather="monitor"></i><span class="text-black">Sales</span></a>
                        </li>
                        <li class="dropdown ">
                            <a href="{{route('SalesPurchaseChart')}}" class="nav-link"><i data-feather="monitor"></i><span>Statistics</span></a>
                        </li>



                        @endif
                    </ul>
                </aside>
            </div>
            <!-- Main Content -->
            @yield('content')


            <div class="settingSidebar">
                <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                </a>
                <div class="settingSidebar-body ps-container ps-theme-default">
                    <div class=" fade show active">
                        <div class="setting-panel-header">Setting Panel
                        </div>
                        <div class="p-15 border-bottom">
                            <h6 class="font-medium m-b-10">Select Layout</h6>
                            <div class="selectgroup layout-color w-50">
                                <label class="selectgroup-item">
                                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                                    <span class="selectgroup-button">Light</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                                    <span class="selectgroup-button">Dark</span>
                                </label>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <h6 class="font-medium m-b-10">Sidebar Color</h6>
                            <div class="selectgroup selectgroup-pills sidebar-color">
                                <label class="selectgroup-item">
                                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="primary Sidebar"><i class="fas fa-sun"></i></span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <h6 class="font-medium m-b-10">Color Theme</h6>
                            <div class="theme-setting-options">
                                <ul class="choose-theme list-unstyled mb-0">
                                    <li title="white" class="active">
                                        <div class="white"></div>
                                    </li>
                                    <li title="cyan">
                                        <div class="cyan"></div>
                                    </li>
                                    <li title="black">
                                        <div class="black"></div>
                                    </li>
                                    <li title="purple">
                                        <div class="purple"></div>
                                    </li>
                                    <li title="orange">
                                        <div class="orange"></div>
                                    </li>
                                    <li title="green">
                                        <div class="green"></div>
                                    </li>
                                    <li title="red">
                                        <div class="red"></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <div class="theme-setting-options">
                                <label class="m-b-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="mini_sidebar_setting">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="control-label p-l-10">Mini Sidebar</span>
                                </label>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <div class="theme-setting-options">
                                <label class="m-b-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="sticky_header_setting">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="control-label p-l-10">Sticky Header</span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                            <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                <i class="fas fa-undo"></i> Restore Default
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <!-- General JS Scripts -->
    <script src="/assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <!-- <script src="/assets/bundles/apexcharts/apexcharts.min.js"></script> -->
    <!-- Page Specific JS File -->
    <script src="/assets/js/page/index.js"></script>
    <!-- Template JS File -->
    <script src="/assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="/assets/js/custom.js"></script>
    @stack('scripts')
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
