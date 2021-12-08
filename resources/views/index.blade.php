<!DOCTYPE html>
<html lang="en">


<!-- chart-apexchart.html  21 Nov 2019 03:58:53 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <!-- Template CSS -->
    <!-- Custom style CSS -->
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='/assets/img/favicon.ico' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <!-- <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                        <li>
                            <form class="form-inline mr-auto">
                                <div class="search-element">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav> -->
            <!-- <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html"> <img alt="image" src="/assets/img/logo.png" class="header-logo" /> <span class="logo-name">Otika</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Main</li>
                        <li class="dropdown">
                            <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Widgets</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li>
                                <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Apps</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="chat.html">Chat</a></li>
                                <li><a class="nav-link" href="portfolio.html">Portfolio</a></li>
                                <li><a class="nav-link" href="blog.html">Blog</a></li>
                                <li><a class="nav-link" href="calendar.html">Calendar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Email</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="email-inbox.html">Inbox</a></li>
                                <li><a class="nav-link" href="email-compose.html">Compose</a></li>
                                <li><a class="nav-link" href="email-read.html">read</a></li>
                            </ul>
                        </li>
                        <li class="menu-header">UI Elements</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Basic
                                    Components</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="alert.html">Alert</a></li>
                                <li><a class="nav-link" href="badge.html">Badge</a></li>
                                <li><a class="nav-link" href="breadcrumb.html">Breadcrumb</a></li>
                                <li><a class="nav-link" href="buttons.html">Buttons</a></li>
                                <li><a class="nav-link" href="collapse.html">Collapse</a></li>
                                <li><a class="nav-link" href="dropdown.html">Dropdown</a></li>
                                <li><a class="nav-link" href="checkbox-and-radio.html">Checkbox &amp; Radios</a></li>
                                <li><a class="nav-link" href="list-group.html">List Group</a></li>
                                <li><a class="nav-link" href="media-object.html">Media Object</a></li>
                                <li><a class="nav-link" href="navbar.html">Navbar</a></li>
                                <li><a class="nav-link" href="pagination.html">Pagination</a></li>
                                <li><a class="nav-link" href="popover.html">Popover</a></li>
                                <li><a class="nav-link" href="progress.html">Progress</a></li>
                                <li><a class="nav-link" href="tooltip.html">Tooltip</a></li>
                                <li><a class="nav-link" href="flags.html">Flag</a></li>
                                <li><a class="nav-link" href="typography.html">Typography</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="shopping-bag"></i><span>Advanced</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="avatar.html">Avatar</a></li>
                                <li><a class="nav-link" href="card.html">Card</a></li>
                                <li><a class="nav-link" href="modal.html">Modal</a></li>
                                <li><a class="nav-link" href="sweet-alert.html">Sweet Alert</a></li>
                                <li><a class="nav-link" href="toastr.html">Toastr</a></li>
                                <li><a class="nav-link" href="empty-state.html">Empty State</a></li>
                                <li><a class="nav-link" href="multiple-upload.html">Multiple Upload</a></li>
                                <li><a class="nav-link" href="pricing.html">Pricing</a></li>
                                <li><a class="nav-link" href="tabs.html">Tab</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="blank.html"><i data-feather="file"></i><span>Blank Page</span></a></li>
                        <li class="menu-header">Otika</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Forms</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="basic-form.html">Basic Form</a></li>
                                <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                                <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                                <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                                <li><a class="nav-link" href="form-wizard.html">Form Wizard</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="grid"></i><span>Tables</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="basic-table.html">Basic Tables</a></li>
                                <li><a class="nav-link" href="advance-table.html">Advanced Table</a></li>
                                <li><a class="nav-link" href="datatables.html">Datatable</a></li>
                                <li><a class="nav-link" href="export-table.html">Export Table</a></li>
                                <li><a class="nav-link" href="editable-table.html">Editable Table</a></li>
                            </ul>
                        </li>
                        <li class="dropdown active">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="pie-chart"></i><span>Charts</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="chart-amchart.html">amChart</a></li>
                                <li class="active"><a class="nav-link" href="chart-apexchart.html">apexchart</a></li>
                                <li><a class="nav-link" href="chart-echart.html">eChart</a></li>
                                <li><a class="nav-link" href="chart-chartjs.html">Chartjs</a></li>
                                <li><a class="nav-link" href="chart-sparkline.html">Sparkline</a></li>
                                <li><a class="nav-link" href="chart-morris.html">Morris</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="feather"></i><span>Icons</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="icon-font-awesome.html">Font Awesome</a></li>
                                <li><a class="nav-link" href="icon-material.html">Material Design</a></li>
                                <li><a class="nav-link" href="icon-ionicons.html">Ion Icons</a></li>
                                <li><a class="nav-link" href="icon-feather.html">Feather Icons</a></li>
                                <li><a class="nav-link" href="icon-weather-icon.html">Weather Icon</a></li>
                            </ul>
                        </li>
                        <li class="menu-header">Media</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Gallery</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="light-gallery.html">Light Gallery</a></li>
                                <li><a href="gallery1.html">Gallery 2</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="flag"></i><span>Sliders</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="carousel.html">Bootstrap Carousel.html</a></li>
                                <li><a class="nav-link" href="owl-carousel.html">Owl Carousel</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="timeline.html"><i data-feather="sliders"></i><span>Timeline</span></a></li>
                        <li class="menu-header">Maps</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="map"></i><span>Google
                                    Maps</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                                <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                                <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                                <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                                <li><a href="gmaps-marker.html">Marker</a></li>
                                <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                                <li><a href="gmaps-route.html">Route</a></li>
                                <li><a href="gmaps-simple.html">Simple</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="vector-map.html"><i data-feather="map-pin"></i><span>Vector
                                    Map</span></a></li>
                        <li class="menu-header">Pages</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user-check"></i><span>Auth</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="auth-login.html">Login</a></li>
                                <li><a href="auth-register.html">Register</a></li>
                                <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                                <li><a href="auth-reset-password.html">Reset Password</a></li>
                                <li><a href="subscribe.html">Subscribe</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="alert-triangle"></i><span>Errors</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="errors-503.html">503</a></li>
                                <li><a class="nav-link" href="errors-403.html">403</a></li>
                                <li><a class="nav-link" href="errors-404.html">404</a></li>
                                <li><a class="nav-link" href="errors-500.html">500</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="anchor"></i><span>Other
                                    Pages</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="create-post.html">Create Post</a></li>
                                <li><a class="nav-link" href="posts.html">Posts</a></li>
                                <li><a class="nav-link" href="profile.html">Profile</a></li>
                                <li><a class="nav-link" href="contact.html">Contact</a></li>
                                <li><a class="nav-link" href="invoice.html">Invoice</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="chevrons-down"></i><span>Multilevel</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Menu 1</a></li>
                                <li class="dropdown">
                                    <a href="#" class="has-dropdown">Menu 2</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Child Menu 1</a></li>
                                        <li class="dropdown">
                                            <a href="#" class="has-dropdown">Child Menu 2</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Child Menu 1</a></li>
                                                <li><a href="#">Child Menu 2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"> Child Menu 3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </aside>
            </div> -->


            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Bar CHart</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="recent-report__chart">
                                            <div id="chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Pie Chart</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="recent-report__chart">
                                            <div id="chart7"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Graph Line Chart</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="echart_graph_line" class="chartsh"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
            </div>
        </div>
        </section>
    </div>
    <footer class="main-footer">
        <div class="footer-left">
            <a href="templateshub.net">Templateshub</a></a>
        </div>
        <div class="footer-right">
        </div>
    </footer>
    </div>
    </div>
    <!-- General JS Scripts -->
    <script src="/assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="/assets/bundles/apexcharts/apexcharts.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="/assets/js/page/chart-apexcharts.js"></script>
    <!-- Template JS File -->
    <script src="/assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="/assets/js/custom.js"></script>
    <!-- JS Libraies -->
    <script src="/assets/bundles/echart/echarts.js"></script>
    <!-- Page Specific JS File -->
    <script src="/assets/js/page/chart-echarts.js"></script>
    <!-- Template JS File -->
    <!-- Custom JS File -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        function chart1() {
            var options = {
                chart: {
                    height: 350,
                    type: 'bar',
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        endingShape: 'rounded',
                        columnWidth: '55%',
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                series: [{
                    name: 'Purchases',

                    data: <?= $stockIn ?>
                }, {
                    name: 'Sales',
                    data: <?= $stockOut ?>
                }],
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    labels: {
                        style: {
                            colors: '#9aa0ac',
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: 'Rwf'
                    },
                    labels: {
                        style: {
                            color: '#9aa0ac',
                        }
                    }
                },
                fill: {
                    opacity: 1

                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return "Rwf " + val
                        }
                    }
                }
            }

            var chart = new ApexCharts(
                document.querySelector("#chart"),
                options
            );

            chart.render();


        }
    </script>

</body>


<!-- chart-apexchart.html  21 Nov 2019 03:58:55 GMT -->

</html>