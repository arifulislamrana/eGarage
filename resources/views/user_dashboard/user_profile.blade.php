@extends('layout.user_dashboard')

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
                            <li class="breadcrumb-item" aria-current="page">user</li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <a class="btn btn-rounded btn-primary float-right" href="{{ route('user.edit') }}">
                Edit Profile
            </a>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="row-12 col-lg-5 col-xl-4">
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session()->get('message') }}
                </div>
                @endif
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
                            @if ($user->image != null)
                                <img class="avatar avatar-xxl avatar-bordered" src="{{ $user->image }}" alt="">
                            @else
                                <img class="avatar avatar-xxl avatar-bordered" src="/BackTheme/images/avatar/avatar-13.png"
                                    alt="">
                            @endif
                        </a>
                        <h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#">{{ $user->name }}</a>
                        </h4>
                        <span><i class="fa fa-map-marker w-20"></i> silver user</span>
                    </div>

                    <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
                        <li>
                            <span class="opacity-60">Pending</span><br>
                            <span class="font-size-20">1 service</span>
                        </li>
                        <li>
                            <span class="opacity-60">Total Taken</span><br>
                            <span class="font-size-20">21 Service</span>
                        </li>
                    </ul>
                </div>

                <!-- Profile Image -->
                <div class="box">
                    <div class="box-body box-profile">
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <p>Email :<span class="text-gray pl-10">{{ $user->email }}</span> </p>
                                    <p>Phone :<span class="text-gray pl-10">
                                            @if ($user->phone != null)
                                                {{ $user->phone }}
                                            @else
                                                Not Given
                                            @endif
                                        </span></p>
                                    <p>Address :<span class="text-gray pl-10">{{ $user->address }}</span></p>
                                    <p>With us since :<span class="text-gray pl-10">{{ $user->created_at }}</span></p>
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
                                <h4>Services Taken By: {{ $user->name }}</h4>
                                <table class="table table-hover">
                                    <tr>
                                        <th>Served By</th>
                                        <th>services</th>
                                        <th>Fee</th>
                                        <th>Status</th>
                                        <th>Taken at</th>
                                    </tr>
                                    <tr>
                                        <td>Mr. xenon</td>
                                        <td>wash, engine clean</td>
                                        <td>1500</td>
                                        <td>completed</td>
                                        <td>12-04-2023</td>
                                    </tr>
                                    <tr>
                                        <td>Mr. xenon</td>
                                        <td>wash, engine clean</td>
                                        <td>1500</td>
                                        <td>pending</td>
                                        <td>12-04-2023</td>
                                    </tr>
                                    <tr>
                                        <td>Mr. xenon</td>
                                        <td>wash, engine clean</td>
                                        <td>1500</td>
                                        <td>completed</td>
                                        <td>12-04-2023</td>
                                    </tr>
                                    <tr>
                                        <td>Mr. xenon</td>
                                        <td>wash, engine clean</td>
                                        <td>1500</td>
                                        <td>completed</td>
                                        <td>12-04-2023</td>
                                    </tr>
                                    <tr>
                                        <td>Mr. xenon</td>
                                        <td>wash, engine clean</td>
                                        <td>1500</td>
                                        <td>completed</td>
                                        <td>12-04-2023</td>
                                    </tr>
                                    <tr>
                                        <td>Mr. xenon</td>
                                        <td>wash, engine clean</td>
                                        <td>1500</td>
                                        <td>completed</td>
                                        <td>12-04-2023</td>
                                    </tr>
                                    <tr>
                                        <td>Mr. xenon</td>
                                        <td>wash, engine clean</td>
                                        <td>1500</td>
                                        <td>completed</td>
                                        <td>12-04-2023</td>
                                    </tr>
                                    <tr>
                                        <td>Mr. xenon</td>
                                        <td>wash, engine clean</td>
                                        <td>1500</td>
                                        <td>completed</td>
                                        <td>12-04-2023</td>
                                    </tr>
                                    <tr>
                                        <td>Mr. xenon</td>
                                        <td>wash, engine clean</td>
                                        <td>1500</td>
                                        <td>completed</td>
                                        <td>12-04-2023</td>
                                    </tr>
                                    <tr>
                                        <td>Mr. xenon</td>
                                        <td>wash, engine clean</td>
                                        <td>1500</td>
                                        <td>completed</td>
                                        <td>12-04-2023</td>
                                    </tr>
                                    <tr>
                                        <td>Mr. xenon</td>
                                        <td>wash, engine clean</td>
                                        <td>1500</td>
                                        <td>completed</td>
                                        <td>12-04-2023</td>
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
