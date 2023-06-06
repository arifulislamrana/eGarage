@extends('layout.landing')

@section('style')

@endsection

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(/FrontTheme/img/carousel-bg-1.jpg);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Set new Password</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Set Password</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Booking Start -->
<div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        @if(count($errors) > 0 )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="p-0 m-0" style="list-style: none;">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="row gx-5">
            <div class="col-lg-12">
                <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                    <h1 class="text-white mb-4">Set new Password</h1>
                    <form method="POST" action="{{ Route('pass.reset.post') }}">
                        @csrf
                        <input hidden name="token" value="{{ $token }}" type="password" class="form-control border-0" placeholder="Your Password" style="height: 55px;">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input name="password" type="password" class="form-control border-0" placeholder="Your Password" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input name="cpassword" type="password" class="form-control border-0" placeholder="Confirm Password" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-secondary w-100 py-3" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Booking End -->
@endsection

@section('script')

@endsection
