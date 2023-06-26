@extends('layout.admin_dashboard')

@section('style')
<style>
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-top: 0;
    }

    .product-image {
      text-align: center;
      margin-bottom: 20px;
    }

    .product-image img {
      max-width: 100%;
      height: auto;
    }

    .product-details {
      margin-bottom: 20px;
    }

    .product-details h2 {
      margin-top: 0;
    }

    .product-details p {
      margin: 0;
      line-height: 1.5;
    }

    .product-price {
      text-align: center;
    }

    .product-price h3 {
      margin: 0;
    }

    .product-price p {
      margin-top: 5px;
      font-weight: bold;
    }
  </style>
@endsection

@section('content')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Admin Details</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Admin</li>
                        <li class="breadcrumb-item active" aria-current="page">Admin Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<section class="content row justify-content-center align-items-center">
    <div class="box box-default">
        <div class="box-header with-border">
          <h4 class="box-title">Admin Details</h4>
        </div>
        <div class="col-12 col-lg-5 col-xl-12">

            <div class="box box-inverse bg-img" style="background-image: url(/BackTheme/images/auth-bg/bg-4.jpg);" data-overlay="2">
                <div class="box-body text-center pb-50">
                  <a href="#">
                    <img class="avatar avatar-xxxl avatar-bordered" src="{{ $admin->image }}" alt="">
                  </a>
                  <h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#">{{ $admin->name }}</a></h4>
                  <span><i class="fa fa-map-marker w-20"></i> Admin</span>
                </div>

                <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
                  <li>
                    <span class="opacity-60">Added at:</span><br>
                    <span class="font-size-20">23-12-2023</span>
                  </li>
                  <li>
                    <span class="opacity-60">Added by:</span><br>
                    <span class="font-size-20">Mr. Aziz</span>
                  </li>
                  <li>
                    <span class="opacity-60">Last Updated at</span><br>
                    <span class="font-size-20">12-04-2023</span>
                  </li>
                </ul>
              </div>

            <!-- Profile Image -->
            <div class="box">
              <div class="box-body box-profile">
                <div class="row">
                  <div class="col-12">
                      <div>
                          <p>Email :<span class="text-gray pl-10">{{ $admin->email }}</span> </p>
                          <p>Address :<span class="text-gray pl-10">Sylhet, Bangladesh</span> </p>
                          <p>Phone :<span class="text-gray pl-10">01734234567</span></p>
                      </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>

        </div>
    </div>
</section>
@endsection

@section('script')

@endsection

