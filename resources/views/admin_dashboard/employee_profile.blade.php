@extends('layout.admin_dashboard')

@section('style')
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Profile</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Extra</li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="row-12 col-lg-5 col-xl-4">

                <div class="box box-inverse bg-img" style="background-image: url(/BackTheme/images/gallery/full/1.jpg);"
                    data-overlay="2">
                    <div class="flexbox px-20 pt-20">
                        <label class="toggler toggler-danger text-white">
                            <input type="checkbox">
                            <i class="fa fa-heart"></i>
                        </label>
                        <div class="dropdown">
                            <a data-toggle="dropdown" href="#"><i class="ti-more-alt rotate-90 text-white"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-picture-o"></i> Shots</a>
                                <a class="dropdown-item" href="#"><i class="ti-check"></i> Follow</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="fa fa-ban"></i> Block</a>
                            </div>
                        </div>
                    </div>

                    <div class="box-body text-center pb-50">
                        <a href="#">
                            <img class="avatar avatar-xxl avatar-bordered" src="/BackTheme/images/avatar/5.jpg"
                                alt="">
                        </a>
                        <h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#">Roben Parkar</a></h4>
                        <span><i class="fa fa-map-marker w-20"></i> Miami</span>
                    </div>

                    <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
                        <li>
                            <span class="opacity-60">Followers</span><br>
                            <span class="font-size-20">8.6K</span>
                        </li>
                        <li>
                            <span class="opacity-60">Following</span><br>
                            <span class="font-size-20">8457</span>
                        </li>
                        <li>
                            <span class="opacity-60">Tweets</span><br>
                            <span class="font-size-20">2154</span>
                        </li>
                    </ul>
                </div>

                <!-- Profile Image -->
                <div class="box">
                    <div class="box-body box-profile">
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <p>Email :<span class="text-gray pl-10">David@yahoo.com</span> </p>
                                    <p>Phone :<span class="text-gray pl-10">+11 123 456 7890</span></p>
                                    <p>Address :<span class="text-gray pl-10">123, Lorem Ipsum, Florida, USA</span></p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="pb-15">
                                    <p class="mb-10">Social Profile</p>
                                    <div class="user-social-acount">
                                        <button class="btn btn-circle btn-social-icon btn-facebook"><i
                                                class="fa fa-facebook"></i></button>
                                        <button class="btn btn-circle btn-social-icon btn-twitter"><i
                                                class="fa fa-twitter"></i></button>
                                        <button class="btn btn-circle btn-social-icon btn-instagram"><i
                                                class="fa fa-instagram"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-12 col-lg-7 col-xl-8">
                <div class="nav-tabs-custom box-profile">
                    <div>
                        <div>

                            <div class="box p-15">
                                <form class="form-horizontal form-element col-12">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputName" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPhone" class="col-sm-2 control-label">Phone</label>

                                        <div class="col-sm-10">
                                            <input type="tel" class="form-control" id="inputPhone" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience" placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputSkills" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="ml-auto col-sm-10">
                                            <div class="checkbox">
                                                <input type="checkbox" id="basic_checkbox_1" checked="">
                                                <label for="basic_checkbox_1"> I agree to the</label>
                                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Terms and Conditions</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="ml-auto col-sm-10">
                                            <button type="submit" class="btn btn-rounded btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection

@section('script')
@endsection