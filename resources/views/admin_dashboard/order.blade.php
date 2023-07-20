@extends('layout.admin_dashboard')

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
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">pending order Table</h4>
                        <div class="box-controls pull-right btn btn-secondary">
                            <form method="GET" action="{{ route('orders.index') }}" id="search-form">
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
                            @if (!empty($pendingOrders) && $pendingOrders->count())
                                <table class="table table-hover">
                                    <tr>
                                        <th>User</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>OrderDate</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($pendingOrders as $order)
                                        <tr>
                                            <td><a>{{ $order->user->name }}</a></td>
                                            <td><a href="javascript:void(0)">{{ $order->product->name }}</a></td>
                                            <td>{{ $order->product->price }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->order_date }}</td>
                                            @if ($order->product->image != null)
                                                <td><img style="height: 40px; width: 45px; border-radius: 50%"
                                                        src="{{ $order->product->image }}" alt="null"></td>
                                            @else
                                                <td><img style="height: 40px; width: 45px; border-radius: 50%"
                                                        src="/BackTheme/images/avatar/avatar-13.png" alt=""></td>
                                            @endif
                                            <td>
                                                <a class="btn btn-rounded btn-primary"
                                                    href="{{ route('orders.show', ['order' => $order->id]) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a class="btn btn-rounded btn-info"
                                                    onclick="showApproveForm('{{ $order->id }}')">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-rounded btn-danger"
                                                    onclick="showModal({{ $order->id }})" data-toggle="modal"
                                                    href="#">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <div class="float-right">
                                    {{ $pendingOrders->links() }}
                                </div>
                            @else
                                <h4 style="text-align: center">No order Exists</h4>
                            @endif
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">processingOrders order Table</h4>
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
                                                    href="{{ route('orders.show', ['order' => $order->id]) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a class="btn btn-rounded btn-danger"
                                                    onclick="showModal({{ $order->id }})" data-toggle="modal"
                                                    href="#">
                                                    <i class="fa fa-trash"></i>
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
                                                    href="{{ route('orders.show', ['order' => $order->id]) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a class="btn btn-rounded btn-danger"
                                                    onclick="showModal({{ $order->id }})" data-toggle="modal"
                                                    href="#">
                                                    <i class="fa fa-trash"></i>
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
        <form id="delForm" method="POST" class="remove-record-model">
            @csrf
            {{ method_field('delete') }}
            <div class="modal modal-danger fade" id="modal-danger" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content bg-danger">
                        <div class="modal-header">
                            <h4 class="modal-title">Delete Alert</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <h4>Delete This order?!</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-rounded btn-warning" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-rounded btn-danger float-right">Delete</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </form>
        <form id="approve" method="POST" class="remove-record-model">
            @csrf
            @method('put')
            <div class="modal fade" id="modal-approve" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Approve Order</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <h4>Approve This Order?!</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Probable Delivery Date:</label>
                                                <input class="form-control" name="delivery_date" type="datetime-local"
                                                    id="example-datetime-local-input" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Assign Order To:</label>
                                                <select class="form-control" name="employee_id" required>
                                                    <option selected>Select Employee</option>
                                                    @foreach ($employees as $employee)
                                                        <option value="{{ $employee->id }}">
                                                            {{ $employee->name }}::{{ $employee->designation }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-rounded btn-warning" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-rounded btn-primary float-right">Approve</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </form>

    </section>
@endsection

@section('script')
    <script>
        function showModal(id) {
            $("#delForm").attr('action', 'orders/' + id);
            $(`#modal-danger`).modal('show');
        }

        function showApproveForm(id) {
            $("#approve").attr('action', 'orders/' + id);
            $(`#modal-approve`).modal('show');
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
