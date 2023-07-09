@extends('layout.employee_dashboard')

@section('style')

@endsection

@section('content')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">booking Table</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Tables</li>
                        <li class="breadcrumb-item active" aria-current="page">booking</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="row">
      <div class="col-12">
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">booking Table</h4>
            <div class="box-controls pull-right btn btn-secondary">
              <form method="GET" action="{{ route('employee.booking') }}" id="search-form">
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
                @if(!empty($bookings) && $bookings->count())
                <table class="table table-hover">
                  <tr>
                    <th>User</th>
                    <th>Time</th>
                    <th>fee</th>
                    <th>Action</th>
                  </tr>
                    @foreach ($bookings as $booking)
                    <tr>
                        <td><a>{{ $booking->user->name }}</a></td>
                        <td>{{ $booking->arrival_time }}</td>
                        <td>
                            {{ $fees[$booking->id] }}
                        </td>
                        <td>
                            <a class="btn btn-rounded btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-rounded btn-info" onclick="showApproveForm('{{$booking->id}}')" ata-toggle="modal" href="#">
                                <i class="fa fa-check"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="float-right">
                    {{ $bookings->links() }}
                </div>
                @else
                    <h4 style="text-align: center">No booking Exists</h4>
                @endif
              </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->

    <form id="approve" method="POST" class="remove-record-model">
        @csrf
        <div class="modal fade" id="modal-approve" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Approve Booking</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <h4>Approve This booking?!</h4>
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
    function showApproveForm(id) {
    //   $("#approve").attr('action', 'user/booking/approve/' + id);
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
