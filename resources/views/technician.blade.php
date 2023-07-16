@extends('layout.landing')

@section('style')

@endsection

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(/FrontTheme/img/carousel-bg-1.jpg);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Technicians</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Technicians</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase">// Our Technicians //</h6>
            <h1 class="mb-5">Our Expert Technicians</h1>
        </div>
        <div class="row g-4">
            @foreach ($employees as $employee)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{ $i = $i + 0.2 }}s">
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        @if ($employee->image == null)
                        <img style="height: 350px" class="img-fluid" src="/FrontTheme/img/team-4.jpg" alt="">
                        @else
                        <img style="height: 350px" class="img-fluid" src="{{ $employee->image }}" alt="">
                        @endif
                        <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="fw-bold mb-0">{{ $employee->name }}</h5>
                        <small>{{ $employee->designation }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->
@endsection

@section('script')

@endsection
