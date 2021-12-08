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
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    @livewireStyles
    <link rel="stylesheet" href="/assets/css/components.css">
    <!-- Custom style CSS -->
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
                <ul class="navbar-nav navbar-right">
                    @if(Auth::user()->gender == 'female')

                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="/assets/img/user.png" class="user-img-radious-style">
                            <span class="d-sm-none d-lg-inline-block"></span></a>
                        @else
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="/assets/img/users/user-8.png" class="user-img-radious-style">
                            <span class="d-sm-none d-lg-inline-block"></span></a>
                        @endif
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">{{Auth::user()->firstName}}</div>
                            <div class="dropdown-divider"></div>
                            <!-- <a href="{{route('logout')}}" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a> -->
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="?"> <img alt="image" src="/assets/img/logo.png" class="header-logo" /> <span class="logo-name">I_M_S</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Main</li>

                        <!-- /// -->
                        @if(Auth::user()->role == 'admin')
                        <li class="dropdown active">
                            <a href="{{route('getLandingPage')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
                        </li>
                        <li class="dropdown ">
                            <!-- ADDDDDD -->
                            <a href="{{route('getUsers')}}" class="nav-link"><i data-feather="user-check"></i><span>Users</span></a>
                        </li>

                        <li class="dropdown ">
                            <!-- ADDDDDD -->
                            <a href="{{route('getAllCompanies')}}" class="nav-link"><i data-feather="layout"></i><span>Companies</span></a>
                        </li>
                        <li class="dropdown ">
                            <!-- ADDDDDD -->
                            <a href="{{route('getAllCategories')}}" class="nav-link"><i data-feather="command"></i><span>Categories</span></a>
                        </li>

                        <li class="dropdown ">
                            <!-- ADDDDDD -->
                            <a href="{{route('getAllBrands')}}" class="nav-link"><i data-feather="command"></i><span>Brands</span></a>
                        </li>
                        @endif
                        @if(Auth::user()->role == 'owner')
                        <li class="dropdown active">
                            <a href="{{route('getOwnerLandingPage',Auth::user()->company->id)}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
                        </li>
                        <li class="dropdown ">
                            <a href="{{route('getCompanyBranches',Auth::user()->company->id)}}" class="nav-link"><i data-feather="monitor"></i><span>Branches</span></a>
                        </li>
                        <li class="dropdown ">
                            <!-- ADDDDDD -->
                            <a href="{{route('getAllCategories')}}" class="nav-link"><i data-feather="command"></i><span>Categories</span></a>
                        </li>

                        <li class="dropdown ">
                            <!-- ADDDDDD -->
                            <a href="{{route('getAllBrands')}}" class="nav-link"><i data-feather="command"></i><span>Brands</span></a>
                        </li>
                        <li class="dropdown ">
                            <a href="{{route('getCompanyProducts',Auth::user()->company->id)}}" class="nav-link"><i data-feather="monitor"></i><span>Products</span></a>
                        </li>
                        @endif





                        @if(Auth::user()->role == 'manager')
                        <li class="dropdown ">
                            <a href="{{route('getCompanyProducts',Auth::user()->branch->company_id)}}" class="nav-link"><i data-feather="monitor"></i><span>Products</span></a>
                        </li>
                        <li class="dropdown ">
                            <a href="{{route('getAddManyStocks')}}" class="nav-link"><i data-feather="monitor"></i><span>Add a stock</span></a>
                        </li>
                        <li class="dropdown ">
                            <a href="{{route('getStock',Auth::user()->branch->id)}}" class="nav-link"><i data-feather="monitor"></i><span>View Stock</span></a>
                        </li>
                        <li class="dropdown ">
                            <a href="{{route('getBranchStockIn',Auth::user()->branch->id)}}" class="nav-link"><i data-feather="monitor"></i><span>View StockIn history</span></a>
                        </li>
                        <li class="dropdown ">
                            <a href="{{route('getSellStocks',Auth::user()->branch->id)}}" class="nav-link"><i data-feather="monitor"></i><span>Make Sales</span></a>
                        </li>
                        <li class="dropdown ">
                            <a href="{{route('getBranchStockOut',Auth::user()->branch->id)}}" class="nav-link"><i data-feather="monitor"></i><span>Sales</span></a>
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
                                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
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
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
