@extends('layout.admin_dashboard')

@section('style')

@endsection

@section('content')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Employee Table</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Tables</li>
                        <li class="breadcrumb-item active" aria-current="page">Employee</li>
                    </ol>
                </nav>
            </div>
        </div>
        <a class="btn btn-rounded btn-primary float-right" href="{{ route('employees.create') }}">
            Add Employee
        </a>
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
            <h4 class="box-title">Employee Table</h4>
            <div class="box-controls pull-right btn btn-secondary">
              <form method="GET" action="{{ route('employees.index') }}" id="search-form">
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
                @if(!empty($employees) && $employees->count())
                <table class="table table-hover">
                  <tr>
                    <th>ID.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                    @foreach ($employees as $employee)
                    <tr>
                        <td><a>{{ $employee->id }}</a></td>
                        <td><a href="javascript:void(0)">{{ $employee->name }}</a></td>
                        <td>{{ $employee->email }}</td>
                        <td><span class="text-muted"><i class="fa fa-clock-o"></i>{{ $employee->phone }}</span> </td>
                        @if ($employee->image != null)
                        <td><img style="height: 40px; width: 45px; border-radius: 50%" src="{{$employee->image}}" alt=""></td>
                        @else
                        <td><img style="height: 40px; width: 45px; border-radius: 50%" src="/BackTheme/images/avatar/avatar-13.png" alt=""></td>
                        @endif
                        <td>
                            <a class="btn btn-rounded btn-primary" href="{{ route('employees.show', ['employee' => $employee->id]) }}">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-rounded btn-info" href="{{ route('employees.edit', ['employee' => $employee->id]) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="btn btn-rounded btn-danger" onclick="showModal({{$employee->id}})" data-toggle="modal" href="#">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="float-right">
                    {{ $employees->links() }}
                </div>
                @else
                    <h4 style="text-align: center">No Employee Exists</h4>
                @endif
              </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
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
                            <h4>Delete This Employee?!</h4>
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
    function showModal(id) {
      $("#delForm").attr('action', 'employees/' + id);
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
