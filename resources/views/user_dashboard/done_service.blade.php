@extends('layout.user_dashboard')

@section('style')

@endsection

@section('content')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Servicing Table</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Tables</li>
                        <li class="breadcrumb-item active" aria-current="page">servicing</li>
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
            <h4 class="box-title">Done Servicing Table</h4>
            <div class="box-controls pull-right btn btn-secondary">
              <form method="GET" action="{{ route('tasks.index') }}" id="search-form">
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
                @if(!empty($doneServices) && $doneServices->count())
                <table class="table table-hover">
                  <tr>
                    <th>Employee</th>
                    <th>Phone</th>
                    <th>Assigned_at</th>
                    <th>Service_time</th>
                    <th>fee</th>
                    <th>Action</th>
                  </tr>
                    @foreach ($doneServices as $task)
                    <tr>
                        <td><a href="{{ route('employees.show', ['employee' => $task->employee->id]) }}">{{ $task->employee->name }}</a></td>
                        <td>{{ $task->employee->phone }}</td>
                        <td>{{ $task->created_at }}</td>
                        <td>{{ $task->service_time }}</td>
                        <td>{{ $doneServicesFees[$task->id]}}</td>
                        <td>
                            <a class="btn btn-rounded btn-primary" href="{{ route('booking.show', ['id' => $task->id]) }}">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="float-right">
                    {{ $doneServices->links() }}
                </div>
                @else
                    <h4 style="text-align: center">No Done Servicing Exists</h4>
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

