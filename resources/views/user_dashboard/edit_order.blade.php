@extends('layout.user_dashboard')

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
                <h4 class="box-title">Edit Order Info.</h4>
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
                <form method="POST" action="{{ route('order.update', ['id' => $order->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Quantity:</label>
                                    <input class="form-control" name="quantity" type="number" value="{{ $order->quantity }}" id="example-datetime-local-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-datetime-local-input">Phone:</label>
                                    <input class="form-control" name="phone" type="tel" value="{{ $order->phone }}" id="example-datetime-local-input">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="phoneNumber1">Delivery address :</label>
                                    <textarea name="delivery_address" class="form-control" id="phoneNumber1" value="{{ old('delivery_address') }}" required cols="10" rows="2">{{ $order->delivery_address }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer text-right">
                            <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                <i class="ti-save-alt"></i> Update
                            </button>
                        </div>
                    </section>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
@endsection

@section('script')
@endsection
