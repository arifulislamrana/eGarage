<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/BackTheme/images/favicon.ico">

    <title>{{ config('app.name') }}</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="/BackTheme/css/vendors_css.css">

    <!-- Style-->
    <link rel="stylesheet" href="/BackTheme/css/style.css">
    <link rel="stylesheet" href="/BackTheme/css/skin_color.css">
    @yield('style')

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">

        <header class="main-header">
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top pl-30">
                <!-- Sidebar toggle button-->
                <div>
                    <ul class="nav">
                        <li class="btn-group nav-item">
                            <a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon"
                                data-toggle="push-menu" role="button">
                                <i class="nav-link-icon mdi mdi-menu"></i>
                            </a>
                        </li>
                        <li class="btn-group nav-item">
                            <a href="#" data-provide="fullscreen"
                                class="waves-effect waves-light nav-link rounded svg-bt-icon" title="Full Screen">
                                <i class="nav-link-icon mdi mdi-crop-free"></i>
                            </a>
                        </li>
                        <li class="btn-group nav-item d-none d-xl-inline-block">
                            <a href="{{ route('home') }}" class="waves-effect waves-light nav-link rounded svg-bt-icon"
                                title="">
                                <i class="ti-home"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="navbar-custom-menu r-side">
                    <ul class="nav navbar-nav">
                        <!-- full Screen -->
                        <li class="search-bar">
                            <div class="lookup lookup-circle lookup-right">
                                <input type="text" name="s">
                            </div>
                        </li>
                        <!-- Notifications -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="waves-effect waves-light rounded dropdown-toggle"
                                data-toggle="dropdown" title="Notifications">
                                <i class="ti-bell"></i>
                            </a>
                            <ul class="dropdown-menu animated bounceIn">

                                <li class="header">
                                    <div class="p-20">
                                        <div class="flexbox">
                                            <div>
                                                <h4 class="mb-0 mt-0">Notifications</h4>
                                            </div>
                                            <div>
                                                <a href="#" class="text-danger">Clear All</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu sm-scrol">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu
                                                sapien elementum, in semper diam posuere.
                                            </a>
                                        </li>
                                        <li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-primary"></i> Nunc fringilla lorem
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam
                                                interdum, at scelerisque ipsum imperdiet.
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all</a>
                                </li>
                            </ul>
                        </li>

                        <!-- User Account-->
                        <li class="dropdown user user-menu">
                            @if (Auth::guard('employee')->user()->image != null)
                                <a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0"
                                    data-toggle="dropdown" title="User">
                                    <img src="{{ Auth::guard('employee')->user()->image }}" alt="">
                                </a>
                            @else
                                <a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0"
                                    data-toggle="dropdown" title="User">
                                    <img src="/BackTheme/images/avatar/avatar-13.png" alt="">
                                </a>
                            @endif
                            <ul class="dropdown-menu animated flipInX">
                                <li class="user-body">
                                    <a class="dropdown-item" href="#"><i class="ti-user text-muted mr-2"></i>
                                        Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('employee.logout') }}"><i
                                            class="ti-lock text-muted mr-2"></i>
                                        Logout</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar-->
            <section class="sidebar">

                <div class="user-profile">
                    <div class="ulogo">
                        <a href="{{ route('employee.dashboard') }}">
                            <!-- logo for regular state and mobile devices -->
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="/BackTheme/images/logo-dark.png" alt="">
                                <h3><b>{{ config('app.name') }}</b> Employee</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">

                    <li>
                        <a href="{{ route('employee.dashboard') }}">
                            <i data-feather="pie-chart"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('employee.profile') }}">
                            <i data-feather="pie-chart"></i>
                            <span>Profile</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('employee.booking') }}">
                            <i data-feather="pie-chart"></i>
                            <span>Bookings</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('employee.order') }}">
                            <i data-feather="pie-chart"></i>
                            <span>Orders</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('employee.product') }}">
                            <i data-feather="pie-chart"></i>
                            <span>Products</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('employee.product.create') }}">
                            <i data-feather="pie-chart"></i>
                            <span>Add Product</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('employee.logout') }}">
                            <i data-feather="lock"></i>
                            <span>Log Out</span>
                        </a>
                    </li>

                </ul>
            </section>

            <div class="sidebar-footer">
                <!-- item-->
                <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
                    data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
                <!-- item-->
                <a href="#" class="link" data-toggle="tooltip" title=""
                    data-original-title="Email"><i class="ti-email"></i></a>
                <!-- item-->
                <a href="{{ route('admin.logout') }}" class="link" data-toggle="tooltip" title=""
                    data-original-title="Logout"><i class="ti-lock"></i></a>
            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">

                <!-- Main content -->
                @yield('content')
                <!-- /.content -->

            </div>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            &copy;
            <script>
                document.write(new Date().getFullYear());
            </script> <a href="#">{{ config('app.name') }}</a>. All Rights Reserved.
        </footer>
    </div>
    <!-- ./wrapper -->


    <!-- Vendor JS -->
    <script src="/BackTheme/js/vendors.min.js"></script>
    <script src="/BackTheme/assets/icons/feather-icons/feather.min.js"></script>

    <!-- Sunny Admin App -->
    <script src="/BackTheme/js/template.js"></script>
    @yield('script')


</body>

</html>
