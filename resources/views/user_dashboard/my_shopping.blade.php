@extends('layout.user_dashboard')

@section('style')
@endsection

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Order Table</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Tables</li>
                            <li class="breadcrumb-item active" aria-current="page">Order</li>
                        </ol>
                    </nav>
                </div>
            </div>
            {{-- <a class="btn btn-rounded btn-primary float-right" href="{{ route('products.create') }}">
            Add Product
        </a> --}}
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
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Completed Orders</h4>
                        <div class="box-controls pull-right btn btn-secondary">
                            <form method="GET" action="{{ route('order.index') }}" id="search-form">
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
                            @if (!empty($completedOrders) && $completedOrders->count())
                                <table class="table table-hover">
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>fee</th>
                                        <th>DeliveryMan</th>
                                        <th>contact</th>
                                        <th>status</th>
                                    </tr>
                                    @foreach ($completedOrders as $order)
                                        <tr>
                                            <td><a href="javascript:void(0)">{{ $order->product->name }}</a></td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>{{ number_format($order->quantity * $order->product->price, 2) }}</td>
                                            <td>{{ $order->employee->name }}</td>
                                            <td>{{ $order->employee->phone }}</td>
                                            <td>{{ $order->status }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                                <div class="float-right">
                                    {{ $completedOrders->links() }}
                                </div>
                            @else
                                <h4 style="text-align: center">No completed Orders Exists</h4>
                            @endif
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection

@section('script')
    <script>
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
