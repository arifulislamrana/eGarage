@extends('layout.admin_dashboard')

@section('style')

@endsection

@section('content')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Update product</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Forms</li>
                        <li class="breadcrumb-item active" aria-current="page">Update Product Form</li>
                        <li class="box-footer text-right">Old Image: <img src="{{ $product->image }}" width="100" height="100"></li>
                        <li class="box-footer text-right">New Image<img id="output" src="" width="100" height="100"></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="content row justify-content-center align-items-center">
    <div class="box box-default">
        <div class="box-header with-border">
          <h4 class="box-title">Update Product Details</h4>
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
            <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <section>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Product Name :</label>
                                <input type="text" name="name" class="form-control" id="firstName5" value="{{ $product->name }}" required>
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
                                <label for="phoneNumber1">Product Description :</label>
                                <textarea name="description" class="form-control" id="phoneNumber1" required cols="10" rows="2" required>{{ $product->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phoneNumber1">Dealer Description :</label>
                                <textarea name="dealer" class="form-control" id="phoneNumber1" required cols="10" rows="2">{{$product->dealer}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailAddress1">Price :</label>
                                <input type="number" name="price" class="form-control" id="emailAddress1" value="{{ $product->price }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailAddress1">Buying Price :</label>
                                <input type="number" name="buying_price" class="form-control" id="emailAddress1" value="{{ $product->buying_price }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailAddress1">Quantity :</label>
                                <input type="number" name="quantity" class="form-control" id="emailAddress1" value="{{ $product->quantity }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status:</label>
                                <select class="form-control" name="status" required>
                                  @if ($product->status == 'active')
                                  <option value="active" selected>Active</option>
                                  <option value="deactive">Deactive</option>
                                  @else
                                  <option value="active">Active</option>
                                  <option value="deactive" selected>Deactive</option>
                                  @endif
                                </select>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Category:</label>
                              <select class="form-control" name="category" required>
                                <option>Select Category</option>
                                @foreach ($categories as $category)
                                @if ($product->category_id == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Discount Type:</label>
                              <select class="form-control" name="discount" required>
                                @foreach ($discounts as $discount)
                                @if ($product->discount_id == $discount->id)
                                <option selected value="{{ $discount->id }}">{{ $discount->name }} : {{ $discount->percentage }}%</option>
                                @else
                                <option value="{{ $discount->id }}">{{ $discount->name }} : {{ $discount->percentage }}%</option>
                                @endif
                                @endforeach
                              </select>
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
