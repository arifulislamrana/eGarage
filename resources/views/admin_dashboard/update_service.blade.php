@extends('layout.admin_dashboard')

@section('style')

@endsection

@section('content')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Update service</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Forms</li>
                        <li class="breadcrumb-item active" aria-current="page">Update service Form</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="content row justify-content-center align-items-center">
    <div class="box box-default">
        <div class="box-header with-border">
          <h4 class="box-title">Update service Details</h4>
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
            <form method="POST" action="{{ route('services.update', ['service' => $service->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <section>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Service Name :</label>
                                <input type="text" name="name" class="form-control" id="firstName5" value="{{ $service->name }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailAddress1">Service Fee :</label>
                                <input type="number" name="fee" class="form-control" id="emailAddress1" value="{{ $service->fee }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status:</label>
                                <select class="form-control" name="status" required>
                                  <option value="available" selected>Available</option>
                                  <option value="closed">Closed</option>
                                </select>
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phoneNumber1">Service Description:</label>
                                <textarea name="description" class="form-control" id="phoneNumber1" value="{{ old('description') }}" required cols="10" rows="2">{{ $service->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="old">Old Image</label>
                                <img id="old" src="{{ $service->image }}" width="100" height="100">
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
