@extends('layout.user_dashboard')

@section('style')

@endsection

@section('content')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Update Profile</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Forms</li>
                        <li class="breadcrumb-item active" aria-current="page">Update Info.</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="content row justify-content-center align-items-center">
    <div class="box box-default">
        <div class="box-header with-border">
          <h4 class="box-title">Update User Details</h4>
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
            <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <section>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Name :</label>
                                <input type="text" name="name" class="form-control" id="firstName5" value="{{ $user->name }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
							<div class="form-group">
								<label for="image">Image :</label>
								<input name="image" type="file" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" id="image" class="form-control">
							</div>
						</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phoneNumber1">Phone Number :</label>
                                <input type="text" name="phone" class="form-control" id="phoneNumber1" value="{{ $user->phone }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cpass">Address:</label>
                                <input type="text" name="address" value="{{ $user->address }}" class="form-control" id="cpass" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="old">Old Image</label>
                                @if ($user->image != null)
                                    <img class="avatar avatar-xxl avatar-bordered" src="{{ $user->image }}" alt="">
                                @else
                                    <img class="avatar avatar-xxl avatar-bordered" src="/BackTheme/images/avatar/avatar-13.png"
                                        alt="">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="output">New Image</label>
                                <img id="output" src="" width="100" height="100">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer text-right">
                        <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                          <i class="ti-save-alt"></i> Save
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
