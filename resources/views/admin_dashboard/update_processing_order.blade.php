@extends('layout.admin_dashboard')

@section('style')
@endsection

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Update order</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Forms</li>
                            <li class="breadcrumb-item active" aria-current="page">Update order Form</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="content col-md-6 row justify-content-center align-items-center">
        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">Update order Details</h4>
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
                <form method="POST" action="{{ route('order.processing.update', ['id' => $order->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Incharge of Delivery:</label>
                                    <select class="form-control" name="employee_id" required>
                                        <option>Select employee</option>
                                        @foreach ($employees as $employee)
                                            @if ($order->employee_id == $employee->id)
                                                <option value="{{ $employee->id }}" selected>{{ $employee->name }}</option>
                                            @else
                                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Status:</label>
                                    <select class="form-control" name="status" required>
                                        @if ($order->status == 'processing')
                                        <option value="completed">completed</option>
                                        <option value="processing" selected>processing</option>
                                        @else
                                        <option value="completed" selected>completed</option>
                                        <option value="processing">processing</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Pobable Delivery:</label>
                                    <input class="form-control" name="delivery_date" value="{{ $order->delivery_date }}" type="datetime-local"
                                                    id="example-datetime-local-input" required>
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
