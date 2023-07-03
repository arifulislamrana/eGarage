@extends('layout.admin_dashboard')

@section('style')

@endsection

@section('content')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Update Task</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Forms</li>
                        <li class="breadcrumb-item active" aria-current="page">Update Task Form</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="content row justify-content-center align-items-center">
    <div class="box box-default">
        <div class="box-header with-border">
          <h4 class="box-title">Update Task Details</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body wizard-content">
            @if(count($errors) > 0 )
              <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="p-0 m-0" style="list-style: none;">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
              </div>
            @endif
            <form method="POST" action="{{ route('tasks.update', ['id' => $task->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <section>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Assign Employee:</label>
                              <select class="form-control" name="employee_id" required>
                                @foreach ($employees as $employee)
                                @if ($employee->id == $task->employee_id)
                                <option value="{{ $employee->id }}" selected>{{ $employee->name }}::{{ $employee->designation }}</option>
                                @else
                                <option value="{{ $employee->id }}">{{ $employee->name }}::{{ $employee->designation }}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cpass">Service Time:</label>
                                <input class="form-control" name="service_time" type="datetime-local" value="{{ $task->service_time }}" id="example-datetime-local-input">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer text-right">
                        <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                          <i class="ti-save-alt"></i> update
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
