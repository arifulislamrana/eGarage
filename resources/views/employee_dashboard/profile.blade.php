@extends('layout.employee_dashboard')

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
                            <li class="breadcrumb-item" aria-current="page">Employee</li>
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

                <div class="box box-inverse bg-img" style="background-image: url(/BackTheme/images/auth-bg/bg-4.jpg);"
                    data-overlay="2">
                    <div class="flexbox px-20 pt-20">
                        <label class="toggler toggler-danger text-white">
                            <input type="checkbox">
                            <i class="fa fa-heart"></i>
                        </label>
                    </div>

                    <div class="box-body text-center pb-50">
                        <a href="#">
                            @if ($employee->image != null)
                                <img class="avatar avatar-xxl avatar-bordered" src="{{ $employee->image }}" alt="">
                            @else
                                <img class="avatar avatar-xxl avatar-bordered" src="/BackTheme/images/avatar/avatar-13.png"
                                    alt="">
                            @endif
                        </a>
                        <h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#">{{ $employee->name }}</a>
                        </h4>
                        <span><i class="fa fa-map-marker w-20"></i> {{ $employee->designation }}</span>
                    </div>

                    <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
                        <li>
                            <span class="opacity-60">Pending</span><br>
                            <span class="font-size-20">8457 Task</span>
                        </li>
                        <li>
                            <span class="opacity-60">Completed</span><br>
                            <span class="font-size-20">2154 Task</span>
                        </li>
                    </ul>
                </div>

                <!-- Profile Image -->
                <div class="box">
                    <div class="box-body box-profile">
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <p>Email :<span class="text-gray pl-10">{{ $employee->email }}</span> </p>
                                    <p>Phone :<span class="text-gray pl-10">{{ $employee->phone }}</span></p>
                                    <p>Address :<span class="text-gray pl-10">{{ $employee->address }}</span></p>
                                    <p>Joinning :<span class="text-gray pl-10">23-05-2023</span></p>
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
                                <h4>Table: Task status of {{ $employee->name }}</h4>
                                <table class="table table-hover">
                                    <tr>
                                        <th>Task ID.</th>
                                        <th>Assigned at</th>
                                        <th>Total Fee</th>
                                        <th>User</th>
                                        <th>Status</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>12-05-2023</td>
                                        <td>1500</td>
                                        <td>Xenon</td>
                                        <td>pending</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>12-05-2023</td>
                                        <td>1500</td>
                                        <td>Xenon</td>
                                        <td>pending</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>12-05-2023</td>
                                        <td>1500</td>
                                        <td>Xenon</td>
                                        <td>pending</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>12-05-2023</td>
                                        <td>1500</td>
                                        <td>Xenon</td>
                                        <td>pending</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>12-05-2023</td>
                                        <td>1500</td>
                                        <td>Xenon</td>
                                        <td>completed</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>12-05-2023</td>
                                        <td>1500</td>
                                        <td>Xenon</td>
                                        <td>completed</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>12-05-2023</td>
                                        <td>1500</td>
                                        <td>Xenon</td>
                                        <td>completed</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>12-05-2023</td>
                                        <td>1500</td>
                                        <td>Xenon</td>
                                        <td>completed</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>12-05-2023</td>
                                        <td>1500</td>
                                        <td>Xenon</td>
                                        <td>completed</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>12-05-2023</td>
                                        <td>1500</td>
                                        <td>Xenon</td>
                                        <td>completed</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>12-05-2023</td>
                                        <td>1500</td>
                                        <td>Xenon</td>
                                        <td>completed</td>
                                    </tr>
                                </table>
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
