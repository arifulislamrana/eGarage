@extends('layout.user_dashboard')

@section('style')
@endsection

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">My Booking</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Forms</li>
                            <li class="breadcrumb-item active" aria-current="page">Booking</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="content row justify-content-center align-items-center">
        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">My Booking</h4>
            </div>
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session()->get('message') }}
            </div>
            @endif
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

                @if (!empty($booking))
                <section>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-datetime-local-input">Time of Service:</label>
                                <h5>{{ $booking->arrival_time }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Total Fee:</label>
                                <h5>{{ $totalFee }} tk</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phoneNumber1">Selected Services :</label>
                                <h5>
                                    @foreach ($services as $service)
                                        {{ $service->name }} {{ ', ' }}
                                    @endforeach
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status:</label>
                                <h5>Not Approved</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phoneNumber1">Special Request :</label>
                                <p>{{ $booking->special_request }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer text-right">
                        <button type="submit" class="btn btn-rounded btn-warning btn-outline mr-1">
                            <a onclick="showModal()" data-toggle="modal" href="#">
                                <i class="ti-trash"></i> Delete
                            </a>
                        </button>
                        <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                            <a href="{{ route('booking.edit', ['id' => $booking->id]) }}"><i class="ti-save-alt"></i> Edit</a>
                        </button>
                    </div>
                </section>
                @else
                <section>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h3>Your booking accepted. See at services section</h3>
                            </div>
                        </div>
                    </div>
                </section>
                @endif
            </div>
            <!-- /.box-body -->
        </div>
        <form action="{{ route('booking.delete', ['id' => $booking->id]) }}" id="delForm" method="POST" class="remove-record-model">
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
                            <h4>Delete This booking?!</h4>
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
    </section>
@endsection

@section('script')
<script>
    function showModal() {
      $(`#modal-danger`).modal('show');
    }
</script>
@endsection
