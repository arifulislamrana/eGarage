@extends('layout.admin_dashboard')

@section('style')

@endsection

@section('content')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Product Table</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Tables</li>
                        <li class="breadcrumb-item active" aria-current="page">Product</li>
                    </ol>
                </nav>
            </div>
        </div>
        <a class="btn btn-rounded btn-primary float-right" href="{{ route('products.create') }}">
            Add Product
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
            <h4 class="box-title">Product Table</h4>
            <div class="box-controls pull-right btn btn-secondary">
              <form method="GET" action="{{ route('products.index') }}" id="search-form">
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
                @if(!empty($products) && $products->count())
                <table class="table table-hover">
                  <tr>
                    <th>ID.</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                    @foreach ($products as $product)
                    <tr>
                        <td><a>{{ $product->id }}</a></td>
                        <td><a href="javascript:void(0)">{{ $product->name }}</a></td>
                        <td>{{ $product->price }}</td>
                        <td><span class="text-muted"><i class="fa fa-clock-o"></i>{{ $product->status }}</span> </td>
                        @if ($product->image != null)
                        <td><img style="height: 40px; width: 45px; border-radius: 50%" src="{{$product->image}}" alt="null"></td>
                        @else
                        <td><img style="height: 40px; width: 45px; border-radius: 50%" src="/BackTheme/images/avatar/avatar-13.png" alt=""></td>
                        @endif
                        <td>
                            <a class="btn btn-rounded btn-primary" href="{{ route('products.show', ['product' => $product->id]) }}">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-rounded btn-info" href="{{ route('products.edit', ['product' => $product->id]) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="btn btn-rounded btn-danger" onclick="showModal({{$product->id}})" data-toggle="modal" href="#">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="float-right">
                    {{ $products->links() }}
                </div>
                @else
                    <h4 style="text-align: center">No Product Exists</h4>
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
                            <h4>Delete This Product?!</h4>
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
      $("#delForm").attr('action', 'products/' + id);
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

