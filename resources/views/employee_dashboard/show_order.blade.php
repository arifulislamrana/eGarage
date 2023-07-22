@extends('layout.employee_dashboard')

@section('style')
@endsection

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Order</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Forms</li>
                            <li class="breadcrumb-item active" aria-current="page">Order</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="content row justify-content-center align-items-center">
        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">Order data</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body wizard-content">
                @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul class="p-0 m-0" style="list-style: none;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session()->get('message') }}
                </div>
                @endif

                @if (!empty($order))
                <section>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-datetime-local-input">Product Name:</label>
                                <h5>{{ $order->product->name }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Quantity:</label>
                                <h5>{{ $order->quantity}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-datetime-local-input">Total Fee:</label>
                                <h5>{{ number_format($order->quantity * $order->product->price, 2) }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status:</label>
                                <h5>{{ $order->status }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phoneNumber1">Delivery Address:</label>
                                <h5>{{ $order->delivery_address }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">User Contact:</label>
                                <h5>{{ $order->phone }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phoneNumber1">Product Image :</label>
                                @if ($order->product->image != null)
                                <td><img style="height: 80px; width: 85px; border-radius: 50%"
                                        src="{{ $order->product->image }}" alt="null"></td>
                            @else
                                <td><img style="height: 40px; width: 45px; border-radius: 50%"
                                        src="/BackTheme/images/avatar/avatar-13.png" alt=""></td>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Delivery Incharge:</label>
                                <h5>{{ $order->employee->name }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Probable Deliver Date:</label>
                                <h5>{{ $order->delivery_date }}</h5>
                            </div>
                        </div>
                    </div>
                </section>
                @else
                <section>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h3>Order data does not exist.</h3>
                            </div>
                        </div>
                    </div>
                </section>
                @endif
            </div>
            <!-- /.box-body -->
        </div>
    </section>
@endsection

@section('script')
@endsection
