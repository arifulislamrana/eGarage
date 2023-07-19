@extends('layout.landing')

@section('style')

@endsection

@section('content')
 <!-- Page Header Start -->
 <div class="container-fluid page-header mb-5 p-0" style="background-image: url(/FrontTheme/img/carousel-bg-1.jpg);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">eGarage Shop</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
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
            <h1 class="mb-5">{{ $category->name }}</h1>
        </div>
        <div class="row g-4">
            @for ($i = 0; $i < count($category->products); $i++)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img style="height: 350px" class="/FrontTheme/img-fluid" src="{{ $category->products[$i]->image }}" alt="">
                        <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                            <a class="btn mx-1" href="{{ route('product.order', ['product' => $category->products[$i]->id]) }}">Buy now</a>
                            <a class="btn mx-1" href="{{ route('product.details', ['product' => $category->products[$i]->id]) }}">Details</a>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="fw-bold mb-0">{{ $category->products[$i]->name }}</h5>
                        <small>price: {{ $category->products[$i]->price }}</small>
                    </div>
                </div>
            </div>
            @endfor
        </div>
        <br>
    </div>
    <br>
    <hr>
</div>
<!-- Team End -->
@endsection

@section('script')

@endsection
