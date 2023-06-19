<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/BackTheme/images/favicon.ico">

    <title>{{ config('app.name') }} </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="/BackTheme/css/vendors_css.css">

    <!-- Style-->
    <link rel="stylesheet" href="/BackTheme/css/style.css">
    <link rel="stylesheet" href="/BackTheme/css/skin_color.css">

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">{{ config('app.name') }} Admin</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i
                                                    class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Admin</li>
                                        <li class="breadcrumb-item active" aria-current="page">Validation</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main content -->
                <section class="content col-8">
                    <!-- Basic Forms -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Admin Login</h4>
                            <h6 class="box-subtitle">Login to monitor your stuff and activities</h6>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form novalidate>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <h5>Email: <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input placeholder="Enter your email" type="email" name="email" class="form-control"
                                                            required
                                                            data-validation-required-message="This field is required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Password: <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input placeholder="Enter your password" type="password" name="password" class="form-control"
                                                            required
                                                            data-validation-required-message="This field is required">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                                        </div>
                                    </form>

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </section>
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- Vendor JS -->
    <script src="/BackTheme/js/vendors.min.js"></script>
    <script src="/BackTheme/assets/icons/feather-icons/feather.min.js"></script>
    <script src="/BackTheme/js/pages/validation.js"></script>
    <script src="/BackTheme/js/pages/form-validation.js"></script>

    <!-- Sunny Admin App -->
    <script src="/BackTheme/js/template.js"></script>

</body>

</html>
