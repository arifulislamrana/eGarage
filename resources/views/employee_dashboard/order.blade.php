@extends('layout.employee_dashboard')

@section('style')
@endsection

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">order Table</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Tables</li>
                            <li class="breadcrumb-item active" aria-current="page">order</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-12">
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        {{ session()->get('message') }}
                    </div>
                @endif
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
                <!-- /.box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">processingOrders order Table</h4>
                        <div class="box-controls pull-right btn btn-secondary">
                            <form method="GET" action="{{ route('employee.order') }}" id="search-form">
                                @csrf
                                <div class="lookup lookup-circle lookup-right">
                                    <input type="text" id="search-text" name="search" placeholder="search">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="table-responsive">
                            @if (!empty($processingOrders) && $processingOrders->count())
                                <table class="table table-hover">
                                    <tr>
                                        <th>User</th>
                                        <th>Product</th>
                                        <th>DeliveryMan</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>DeliverDate</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($processingOrders as $order)
                                        <tr>
                                            <td><a>{{ $order->user->name }}</a></td>
                                            <td><a href="javascript:void(0)">{{ $order->product->name }}</a></td>
                                            <td><a href="javascript:void(0)">{{ $order->employee->name }} <br />
                                                    {{ $order->employee->phone }}</a></td>
                                            <td>{{ $order->product->price }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->delivery_date }}</td>
                                            <td>
                                                <a class="btn btn-rounded btn-primary"
                                                    href="{{ route('employee.order.show', ['order' => $order->id]) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a class="btn btn-rounded btn-info"
                                                    href="#" onclick="showModal({{ $order->id }})" data-toggle="modal">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <div class="float-right">
                                    {{ $processingOrders->links() }}
                                </div>
                            @else
                                <h4 style="text-align: center">No order Exists</h4>
                            @endif
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">completedOrders order Table</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="table-responsive">
                            @if (!empty($completedOrders) && $completedOrders->count())
                                <table class="table table-hover">
                                    <tr>
                                        <th>User</th>
                                        <th>Product</th>
                                        <th>DeliveryMan</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>DeliverDate</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($completedOrders as $order)
                                        <tr>
                                            <td><a>{{ $order->user->name }}</a></td>
                                            <td><a href="javascript:void(0)">{{ $order->product->name }}</a></td>
                                            <td><a href="javascript:void(0)">{{ $order->employee->name }} <br />
                                                    {{ $order->employee->phone }}</a></td>
                                            <td>{{ $order->product->price }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->delivery_date }}</td>
                                            <td>
                                                <a class="btn btn-rounded btn-primary"
                                                    href="{{ route('employee.order.show', ['order' => $order->id]) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <div class="float-right">
                                    {{ $completedOrders->links() }}
                                </div>
                            @else
                                <h4 style="text-align: center">No order Exists</h4>
                            @endif
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->

    </section>
    <form id="delForm" method="POST" class="remove-record-model">
        @csrf
        {{ method_field('put') }}
        <div class="modal modal-danger fade" id="modal-danger" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content bg-warning">
                    <div class="modal-header">
                        <h4 class="modal-title">Alert</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div style="background-color: greenyellow" class="modal-body">
                        <h4>Delivered This order?!</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-rounded btn-primary float-right">yes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
@endsection

@section('script')
    <script>
        function showModal(id) {
            $("#delForm").attr('action', 'orders/' + id);
            $(`#modal-danger`).modal('show');
        }
        var input = document.getElementById("search-text");
        input.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                const form = document.getElementById(`search-form`);
                form.submit();
            }
        });
    </script>
@endsection
