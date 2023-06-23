@extends('layout.admin_dashboard')

@section('style')

@endsection

@section('content')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Create employee</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Forms</li>
                        <li class="breadcrumb-item active" aria-current="page">Create Employee Form</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="content row justify-content-center align-items-center">
    <div class="box box-default">
        <div class="box-header with-border">
          <h4 class="box-title">New Employee Details</h4>
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
            <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
                @csrf
                <section>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Name :</label>
                                <input type="text" name="name" class="form-control" id="firstName5" value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailAddress1">Email Address :</label>
                                <input type="email" name="email" class="form-control" id="emailAddress1" value="{{ old('email') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phoneNumber1">Phone Number :</label>
                                <input type="text" name="phone" class="form-control" id="phoneNumber1" value="{{ old('phone') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
							<div class="form-group">
								<label for="image">Image :</label>
								<input name="image" type="file" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" id="image" class="form-control" required>
							</div>
						</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pass">Password :</label>
                                <input type="password" name="password" class="form-control" id="pass">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cpass">Confirm Password:</label>
                                <input type="password" name="cpassword" class="form-control" id="cpass">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer text-right">
                        <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                          <i class="ti-save-alt"></i> Save
                        </button>
                    </div>
                    <img id="output" src="" width="100" height="100">
                </section>
            </form>
        </div>
        <!-- /.box-body -->
      </div>
</section>
@endsection

@section('script')

@endsection
